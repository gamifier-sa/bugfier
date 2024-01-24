<?php

namespace App\Repositories\Classes;

use App\Models\Admin;
use App\Models\Role;
use App\Repositories\Interfaces\IMainRepository;

class RoleRepository extends BasicRepository implements IMainRepository
{
    /**
     * @var array
     */
    protected array $fieldSearchable = [
        'id', 'name_ar', 'name_en'
    ];

    /**
     * Configure the Model
     *
     * @return string
     */
    public function model() : string
    {
        return Role::class;
    }

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable() : array
    {
        return $this->fieldSearchable;
    }

    public function getFieldsRelationShipSearchable()
    {
        return $this->model->searchRelationShip;
    }

    public function translationKey()
    {
        return $this->model->translationKey();
    }

    public function findBy($relations = [])
    {
        return $this->all(relations: $relations);
    }

    /**
     * @param $data
     */
    public function store($data)
    {
        $role = $this->create([
            'name_ar' => $data['name_ar'],
            'name_en' => $data['name_en']
        ]);
        $role->abilities()->attach($data['abilities']);
    }


    public function list()
    {
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function show($id)
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
        $role = $this->save([
            'name_ar' => $request['name_ar'],
            'name_en' => $request['name_en']],
        $id);
        $role->abilities()->sync($request['abilities']);
    }

    /**
     * @param $id
     * @return bool|mixed|null
     */
    public function destroy($id) : mixed
    {
        return $this->delete($id);
    }

    public function admins($id)
    {
        $role  = Role::findOrFail($id)->load('admins:id,name_ar,email,phone,image,created_at');
        $adminsCount = $role->admins()->count();
        $page    = $request['page']     ?? 1;
        $perPage = $request['per_page'] ?? 10;

        return response()->json([
            "recordsTotal"    => $adminsCount,
            "recordsFiltered" => $role->admins()->count(),
            'data'            => $role->admins()->skip(($page - 1) * $perPage)->take($perPage)
        ]);
    }
}
