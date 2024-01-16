<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Classes\{AbilityRepository, RoleRepository};
use App\Http\Requests\Dashboard\RoleRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    /**
     * @var string[]
     */
    public array $modules = [
        'admins',
        'roles',
        'projects',
        'bugs',
        'awards',
        'statuses',
    ];

    protected RoleRepository       $roleRepository;
    protected AbilityRepository $abilityRepository;
    public function __construct(RoleRepository $roleRepository, AbilityRepository $abilityRepository)
    {
        $this->roleRepository       = $roleRepository;
        $this->abilityRepository = $abilityRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('view_roles');
        $roles     = $this->roleRepository->findBy(['abilities' => ['id','category','action'] ,'admins' => ['id']]);
        $abilities = $this->abilityRepository->findBy($request);
        return view('dashboard.roles.index',compact('roles','abilities'),['modules' => $this->modules]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $this->authorize('create_roles');
        $this->roleRepository->store($request->validated());
        return redirect()->route('dashboard.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $role        = $this->roleRepository->show($id);
        $abilities   = $this->abilityRepository->findBy(request());
        $modules     = $this->modules;
        if (!$request->ajax())
            return view('dashboard.roles.show', get_defined_vars());
        else
            return response()->json([
                'name_ar'        => $role['name_ar'],
                'name_en'        => $role['name_en'],
                'role_abilities' => $role['abilities'],
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $this->authorize('update_roles');
        $this->roleRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function admins($id)
    {
        $this->roleRepository->admins($id);
    }
}
