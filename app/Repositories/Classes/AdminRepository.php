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
        'id', 'name_ar', 'name_en', 'email', 'phone'
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

    public function getFieldsRelationShipSearchable()
    {
        return $this->model->searchRelationShip;
    }

    public function translationKey()
    {
        return $this->model->translationKey();
    }

    public function findBy(Request $request): Collection|array
    {
        return $this->all(orderBy:$request->order);
    }

    /**
     * @param $data
     */
    public function store($data) : void
    {
        $data['password'] = Hash::make($data['password']);
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
     * @param      $request
     * @param null $id
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
