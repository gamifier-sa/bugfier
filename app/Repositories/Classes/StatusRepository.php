<?php

namespace App\Repositories\Classes;

use App\Models\{Status};
use App\Repositories\Interfaces\{IAdminRepository, IMainRepository};
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Illuminate\Http\Request;

class StatusRepository extends BasicRepository implements IAdminRepository, IMainRepository
{
    /**
     * @var array
     */
    protected array $fieldSearchable = [
        'id', 'title_ar', 'title_en'
    ];

    /**
     * Configure the Model
     * @return string
     */
    public function model(): string
    {
        return Status::class;
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
        return $this->all(orderBy: $request->order);
    }

    /**
     * @param $data
     * @return void
     */
    public function store($data) : void
    {
        if (isset($data['is_default']) == 1)
        {
            $this->model->query()->update(['is_default' => 0]);
        }
        $this->create($data);
    }

    /**
     * @return array|Builder[]|Collection
     */
    public function list()
    {
        return $this->all();
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
        if (isset($request['is_default']) == 1)
        {
            $this->model->query()->update(['is_default' => 0]);
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
     * @return mixed
     */
    public function first() : mixed
    {
       return $this->model->where('is_default', 1)->first();
    }
}
