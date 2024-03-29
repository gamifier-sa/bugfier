<?php


namespace App\Repositories\Classes;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ChangeTrait;
use App\Traits\LanguageTrait;
use App\Traits\MediaTrait;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

abstract class BasicRepository
{
    use ChangeTrait, LanguageTrait, MediaTrait;

    /**
     * @var Model
     */
    protected $model;

    /**
     * Configure the Model
     *
     * @return string
     */

    abstract public function model();

    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     *
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Make Model instance
     *
     * @return Model
     * @throws \Exception
     *
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }

    /**
     * Get searchable fields array
     *
     * @return array
     */
    abstract public function getFieldsSearchable();

    abstract public function getFieldsRelationShipSearchable();

    abstract public function translationKey();

    /**
     * Display a listing of the resource.
     * column is array with we select it from table
     */

    function all($orsFilters = [], $andsFilters = [], $relations = [], $searchingColumns = null, $withTrashed = false, $orderBy = [], $group = null, $Between = [], $subRelation = [])
    {


        $columns = $searchingColumns ?? $this->model->getConnection()->getSchemaBuilder()->getColumnListing($this->model->getTable());
        $relationsWithColumns = $this->getRelationWithColumns($relations); // this fn takes [ brand => [ id , name ] ] then returns : brand:id,name to use it in with clause

        /** Get the request parameters **/
        $params = request()->all();
        /** Set the current page **/
        $page = $params['page'] ?? 1;

        /** Set the number of items per page **/
        $perPage = $params['per_page'] ?? 10;

        // set passed filters from controller if exist
        if (!$withTrashed)
            $this->model = $this->model->query()->with($relationsWithColumns);
        else
            $this->model = $this->model->query()->onlyTrashed()->with($relationsWithColumns);


        /** Get the count before search **/
        $itemsBeforeSearch = $this->model->count();

        // general search
        if (isset($params['search']['value'])) {

            $filterArrays = $this->seperateSearch($params['search']['value']);
            if (!is_array($filterArrays)) {
                $params['search']['value'] = $filterArrays;
            } else {
                $params['search']['value'] = '';
            }

            if (str_starts_with($params['search']['value'], '0'))
                $params['search']['value'] = substr($params['search']['value'], 1);

            /** search in the original table **/
            foreach ($columns as $column)
                array_push($orsFilters, [$column, 'LIKE', "%" . $params['search']['value'] . "%"]);


        }


        // filter search
        if ($itemsBeforeSearch == $this->model->count() && $params) {

            $searchingKeys = collect($params['columns'])->transform(function ($entry) {
                return $entry['search']['value'] != null && $entry['search']['value'] != 'all' ? Arr::only($entry, ['data', 'name', 'search']) : null; // return just columns which have search values
            })->whereNotNull()->values();

            /** if request has filters like status **/
            if ($searchingKeys->count() > 0) {
                /** search in the original table **/
                foreach ($searchingKeys as $column) {

                    if (!($column['name'] == 'created_at' or $column['name'] == 'date'))
                        array_push($andsFilters, [$column['name'], '=', $column['search']['value']]);
                    else {
                        if (!str_contains($column['search']['value'], ' - ')) // if date isn't range ( single date )
                            $this->model->orWhereDate($column['name'], $column['search']['value']);
                        else
                            $this->model->orWhereBetween($column['name'], $this->getDateRangeArray($column['search']['value']));
                    }
                }


            }
        } else {

            return $this->model->get();
        }



        $this->model = $this->model->where(function ($query) use ($orsFilters) {
            foreach ($orsFilters as $filter) $query->orWhere([$filter]);
        });

        if (isset($filterArrays) && is_array($filterArrays)) {
            $this->model = $this->model->where(function ($query) use ($filterArrays) {
                return $query->where($filterArrays);
            });

        }


        if ($andsFilters)

            $this->model->where($andsFilters);
        if ($Between && $Between[1] != null && $Between[2] != null) {

            $this->model->WhereBetween($Between[0], [$Between[1], $Between[2]]);
        } elseif ($Between && $Between[1] != null) {
            $this->model->whereDate($Between[0], '>=', $Between[1]);
        } elseif ($Between && $Between[2] != null) {
            $this->model->whereDate($Between[0], '<=', $Between[2]);
        }

        if ($group) {
            $this->model->groupBy($group);
        }
        if ($subRelation) {
            $this->model->with($group);
        }

        if (!empty($orderBy) && count($orderBy) > 0 && !empty(request()['order'])) {
            $columnName = request()['columns'][(int) request()['order'][0]['column']]['data'];
            if ($columnName) {
                $this->model->orderBy($columnName, $orderBy[0]['dir']);
            } else {
                $this->model->orderBy('id', 'desc');
            }
        } else {
            $this->model->orderBy('id', 'desc');
        }


        return [
            "recordsTotal" => $this->model->count(),
            "recordsFiltered" => $this->model->count(),
            'data' => $this->model->skip(($page - 1) * $perPage)->take($perPage)->get()
        ];
    }

    function getRelationWithColumns($relations): array
    {
        $relationsWithColumns = [];
        foreach ($relations as $relation => $columns) {
            array_push($relationsWithColumns, $relation . ":" . implode(",", $columns));
        }
        return $relationsWithColumns;
    }

    function getDateRangeArray($dateRange): array
    {
        $dateRange = explode(' - ', $dateRange);
        return [$dateRange[0] . ' 00:00:00', $dateRange[1] . ' 23:59:59'];
    }
    /**
     * @param string          $searchValue
     */
    public function seperateSearch($searchValue)
    {
        $filters = [];
        $pairs = explode(',', $searchValue);
        foreach ($pairs as $pair) {
            $parts = explode('=', $pair);
            $key = trim($parts[0]);
            $value = isset($parts[1]) ? trim($parts[1]) : null;
            if ($key == 'search') {
                return $parts[1];
            }

            if (!empty($key) && !empty($value)) {
                $filters[] = [$key, '=', $value];
            }
        }

        return $filters;
    }

    /**
     * @param          $id
     * @param string[] $column
     * @param array    $withRelations
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function find($id, $column = ['*'], $withRelations = [])
    {
        $query = $this->model->newQuery();
        if (!empty($withRelations)) {
            $query->with($withRelations);
            //            $query = $this->with($query, $withRelations);
        }
        return $query->find($id, $column);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        return $this->model->create($request);
    }

    /**
     * @param      $request
     * @param null $id
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function save($request, $id = null) : Model|Collection|Builder|array|null
    {
        $data = $this->find($id);
        $data->update($request);
        return $this->find($id);
    }

    /**
     * @param $id
     * @param $key
     * @param $value
     * @return Collection|mixed
     */
    public function updateValue($id, $key, $value) : mixed
    {
        return $this->change($this->find($id), $key, $value);
    }

    /**
     * @param $id
     * @return false|Builder|Builder[]|Collection|Model|null
     */
    public function delete($id) : Model|Collection|false|Builder|array|null
    {
        $data = $this->find($id, ['*'], [], true);

        $result = $data->delete();

        if ($result) {
            return $data;
        } else {
            return false;
        }

    }
}
