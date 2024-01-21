<?php

namespace App\Repositories\Classes;

use App\Models\{Level};
use App\Repositories\Interfaces\{IAdminRepository, IMainRepository};
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Illuminate\Http\Request;

class LevelRepository extends BasicRepository implements IAdminRepository, IMainRepository
{
    /**
     * @var array
     */
    protected array $fieldSearchable = [
        'id', 'name_ar', 'name_en'
    ];

    /**
     * Configure the Model
     * @return string
     */
    public function model(): string
    {
        return Level::class;
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
}
