<?php

namespace App\Repositories\Classes;

use App\Models\Admin;
use App\Repositories\Interfaces\{IAdminRepository, IMainRepository};
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRepository extends BasicRepository implements IAdminRepository, IMainRepository
{
    /**
     * @var array
     */
    protected array $fieldSearchable = [
        'id', 'name_ar', 'name_en', 'email', 'phone', 'level_id'
    ];


    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Admin::class;
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

    public function translationKey()
    {
        return $this->model->translationKey();
    }

    public function findBy(Request $request): Collection|array
    {
        return $this->all(relations: ['level' => ['id', 'name_ar', 'name_en', 'exp']], orderBy: $request->order);
    }

    /**
     * @param $data
     */
    public function store($data) : void
    {
        $data['password'] = bcrypt($data['password']);
        $user =  $this->create($data);
        $user->roles()->sync($data['roles']);
    }


    public function list()
    {
        return $this->model->where('daily_attendance', '1')->get();
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
        if (!isset($request['password'])) {
            unset($request['password']);
        }
        if (isset($request['password'])) {
            $request['password'] = Hash::make($request['password']);
        }
        $user  = $this->save($request, $id);
        $user->roles()->sync($request['roles']);
        return $user;
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
     * @param $data
     * @return void
     */
    public function updateProfile($data) : void
    {
        if (isset($data['image'])) {
            $data['image'] = uploadImage($data['image'],'Admins');
        }

        auth()->user()->update($data);
    }
}
