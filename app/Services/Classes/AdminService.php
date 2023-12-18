<?php

namespace App\Services\Classes;

use App\Repositories\Interfaces\IAdminRepository;
use App\Services\Interfaces\IAdminService;
use Illuminate\Http\Request;

class AdminService implements IAdminService
{


    /**
     * @param IAdminRepository $adminRepository
     */
    public function __construct(
        private IAdminRepository $adminRepository,
    ) {
        $this->adminRepository = $adminRepository;
    }



    public function findBy(Request $request,$pagination = false , $perPage = 10)
    {
        return $this->adminRepository->findBy($request,$pagination,  $perPage);
    }
    public function store()
    {
    }
    public function list()
    {
    }
    public function show()
    {
    }
}
