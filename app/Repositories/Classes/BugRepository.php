<?php

namespace App\Repositories\Classes;

use App\Models\{Admin, Level, Bug};
use App\Repositories\Interfaces\{IAdminRepository, IMainRepository};
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Illuminate\Http\Request;

class BugRepository extends BasicRepository implements IAdminRepository, IMainRepository
{
    /**
     * @var array
     */
    protected array $fieldSearchable = [
        'id', 'title', 'description'
    ];

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Bug::class;
    }

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * @return mixed
     */
    public function getFieldsRelationShipSearchable() : mixed
    {
        return $this->model->searchRelationShip;
    }

    /**
     * @return mixed
     */
    public function translationKey() : mixed
    {
        return $this->model->translationKey();
    }

    /**
     * @param Request $request
     * @return Collection|array
     */
    public function findBy(Request $request): Collection|array
    {
        return $this->all(
            relations: [
                'project' => ['id', 'title_ar','title_en'],
                'admin'   => ['id', 'name_ar','name_en'],
                'status'  => ['id', 'title_ar', 'title_en']
            ],

            orderBy: $request->order
        );
    }

    /**
     * @param $data
     * @return void
     */
    public function store($data) : void
    {
        if (isset($data['images'])) {
            $imagesArr = [];
            foreach($data['images'] as $image){
                $imagesArr[] = uploadImage($image,'Bugs');
            }
            $data['images'] = serialize($imagesArr);
        }

        $this->create($data);
    }

    public function list()
    {
    }

    /**
     * @param $id
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function show($id) : Model|Collection|Builder|array|null
    {
        return $this->find($id);
    }

    /**
     * @param $request
     * @param $id
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function update($request, $id = null) : Model|Collection|Builder|array|null
    {
        if (isset($request['images'])) {
            $imagesArr = [];
            foreach($request['images'] as $image){
                $imagesArr[] = uploadImage($image,'Bugs');
            }
            $request['images'] = serialize($imagesArr);
        }

        return $this->save($request, $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id): mixed
    {
        return $this->delete($id);
    }

    /**
     * @param string $id
     * @param string $key
     * @param int    $value
     * @return Collection|mixed
     */
    public function updateExp(string $id, string $key, int $value) : mixed
    {
        $bugs        = $this->show($id);
        $sumBug      = $this->model->where('created_by', $bugs->created_by)->sum('exp');
        $sumBugValue = $sumBug + $value;

        $level = Level::orderByRaw('ABS(exp - ?)', [$sumBugValue])->first();
        if ($level) {
            $user = Admin::find($bugs->created_by);
            $user->level_id = $level->id ?? 1;
            $user->save();
        }

        return $this->updateValue($id, $key, $value);
    }
}
