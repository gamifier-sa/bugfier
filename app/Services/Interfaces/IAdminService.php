<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface IAdminService
{
    public function findBy(Request $request,$pagination = false , $perPage = 10); 
    public function store(); 
    public function list(); 
    public function show(); 
}
