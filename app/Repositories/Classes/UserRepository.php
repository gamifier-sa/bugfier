<?php

namespace App\Repositories\Classes;

use App\Mail\InvitationEmail;
use App\Models\Admin;
use App\Models\User;
use App\Repositories\Interfaces\IAdminRepository;
use App\Repositories\Interfaces\IMainRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserRepository extends BasicRepository implements IAdminRepository, IMainRepository
{
    /**
     * @var array
     */

    protected array $fieldSearchable = [
        'id', 'name',  'email', 'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return User::class;
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

    public function findBy(Request $request): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->all(orderBy:$request->order);
    }

    /**
     * @param $data
     */
    public function store($data)
    {
        $password = Str::random(8);
        $data['password']    = Hash::make($password);
        $data['created_by'] = auth()->id();
        $this->create($data);
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
     * @param      $request
     * @param null $id
     */

    public function update($request, $id = null)
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
