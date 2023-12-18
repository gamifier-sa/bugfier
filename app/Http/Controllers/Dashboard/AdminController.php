<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Repositories\Classes\AdminRepository;
use App\Repositories\Classes\RoleRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected AdminRepository $adminRepository;
    protected RoleRepository $roleRepository;
    public function __construct(
        AdminRepository $adminRepository,
        RoleRepository $roleRepository
    )
    {
//        $this->authorize('view_admins',['index']);
//        $this->authorize('create_admins', ['create', 'store']);
//        $this->authorize('show_admins', ['show']);
//        $this->authorize('update_admins', ['update']);
//        $this->authorize('delete_admins', ['destroy']);

        $this->adminRepository = $adminRepository;
        $this->roleRepository  = $roleRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request  $request)
    {
        if ($request->ajax()) {
            $admins = $this->adminRepository->findBy($request);
            return response()->json($admins);
        }
        return view('dashboard.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->roleRepository->findBy();
        return view('dashboard.admins.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $this->adminRepository->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = $this->adminRepository->show($id);
        $roles = $this->roleRepository->findBy();
        return view('dashboard.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, string $id)
    {
        $this->adminRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->adminRepository->destroy($id);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function admins(string $id)
    {
        $this->roleRepository->admins($id);
    }
}
