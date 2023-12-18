<?php

namespace App\Http\Services\Dashboard;

use App\Models\Admin;

class AdminService
{
    /**
     * @return array
     */
    public function index() : array
    {
        return getDataTable( model: new Admin() );
    }

    /**
     * @param $data
     */
    public function store($data) : void
    {

        $Admin = Admin::create($data);
        $rolesAndDefaultOne = array_merge( $data['roles'] , [ "2" ] );
        $Admin->roles()->attach( $rolesAndDefaultOne );
    }

    /**
     * @param $Admin
     * @param $data
     */
    public function update($Admin,$data) : void
    {
        $Admin->update($data);
        $rolesAndDefaultOne = array_merge($data['roles'] , [ "2" ] );

        $Admin->roles()->sync( $rolesAndDefaultOne );
    }

    /**
     * @param $Admin
     */
    public function delete($Admin) : void
    {
        $Admin->delete();
    }

    /**
     * @param $data
     */
    public function updateProfile($data) : void
    {
        auth('admin')->user()->update($data);
    }

}
