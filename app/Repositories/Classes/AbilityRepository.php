<?php

namespace App\Repositories\Classes;

use App\Models\Ability;
use App\Repositories\Interfaces\IMainRepository;
use Illuminate\Database\Eloquent\{Builder, Collection, Model};

class AbilityRepository extends BasicRepository implements IMainRepository
{
    /**
     * @var array
     */
    protected array $fieldSearchable = [
        'id', 'name', 'category', 'action'
    ];

    /**
     * Configure the Model
     *
     * @return string
     */
    public function model() : string
    {
        return Ability::class;
    }

    /**
     * Return searchable fields
     *
     * @return array|string[]
     */
    public function getFieldsSearchable() : array
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
     * @param $request
     * @return array|Builder[]|Collection
     */
    public function findBy($request) : Collection|array
    {
        return $this->all();
    }

    /**
     * @param $data
     * @return void
     */
    public function store($data) : void
    {
        $role = $this->create(['name' => $data['name']]);
        $role->permissions()->attach($data['permissions']);
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
     * @return void
     */
    public function update($request, $id = null) : void
    {
        $role = $this->save(['name' => $request['name']], $id);
        $role->permissions()->sync($request['permissions']);
    }

    /**
     * @param $id
     * @return bool|mixed|null
     */
    public function destroy($id) : mixed
    {
        return $this->delete($id);
    }
}
