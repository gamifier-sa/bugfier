<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Repositories\Classes\{AbilityRepository, RoleRepository};
use App\Http\Requests\Dashboard\RoleRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{JsonResponse, RedirectResponse, Request};

class RoleController extends Controller
{

    /**
     * @var string[]
     */
    public array $modules = [
        'admins', 'roles', 'projects', 'bugs',
        'awards', 'statuses', 'levels',
    ];

    /**
     * @var RoleRepository
     */
    protected RoleRepository       $roleRepository;

    /**
     * @var AbilityRepository
     */
    protected AbilityRepository $abilityRepository;

    /**
     * @param RoleRepository    $roleRepository
     * @param AbilityRepository $abilityRepository
     */
    public function __construct(RoleRepository $roleRepository, AbilityRepository $abilityRepository)
    {
        $this->roleRepository       = $roleRepository;
        $this->abilityRepository = $abilityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $this->authorize('view_roles');
        $roles     = $this->roleRepository->findBy(['abilities' => ['id','category','action'] ,'admins' => ['id']]);
        $abilities = $this->abilityRepository->findBy($request);
        $modules   = $this->modules;
        return view('dashboard.roles.index', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @return RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        $this->authorize('create_roles');
        $this->roleRepository->store($request->validated());
        return redirect()->route('dashboard.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param string  $id
     * @return Application|Factory|View|JsonResponse
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
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request
     * @param string|null $id
     * @return void
     */
    public function update(RoleRequest $request, ?string $id)
    {
        $this->authorize('update_roles');
        $this->roleRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function admins(string $id)
    {
        $this->roleRepository->admins($id);
    }
}
