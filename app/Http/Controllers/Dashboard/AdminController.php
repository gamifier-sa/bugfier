<?php

namespace App\Http\Controllers\Dashboard;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\{AdminRequest, UpdateProfileRequest};
use App\Repositories\Classes\{AdminRepository, LevelRepository, RoleRepository};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Foundation\Application as ApplicationAlias;
use Illuminate\Http\{JsonResponse, Request};

class  AdminController extends Controller
{
    /**
     * @var AdminRepository
     */
    protected AdminRepository $adminRepository;

    /**
     * @var RoleRepository
     */
    protected RoleRepository $roleRepository;

    /**
     * @var LevelRepository
     */
    protected LevelRepository $levelRepository;

    /**
     * @param AdminRepository $adminRepository
     * @param RoleRepository  $roleRepository
     * @param LevelRepository $levelRepository
     */
    public function __construct(AdminRepository $adminRepository, RoleRepository $roleRepository, LevelRepository $levelRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->roleRepository  = $roleRepository;
        $this->levelRepository = $levelRepository;
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|ApplicationAlias|JsonResponse
     */
    public function index(Request  $request)
    {
        $this->authorize('view_admins');
        if ($request->ajax()) {
            $admins = $this->adminRepository->findBy($request);
            return response()->json($admins);
        }
        $statuses = Status::cases();
        $levels   = $this->levelRepository->list();
        return view('dashboard.admins.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|ApplicationAlias
     */
    public function create()
    {
        $this->authorize('create_admins');
        $roles    = $this->roleRepository->findBy();
        $statuses = Status::cases();
        $levels   = $this->levelRepository->list();
        return view('dashboard.admins.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AdminRequest $request
     * @return void
     */
    public function store(AdminRequest $request)
    {
        $this->authorize('create_admins');
        $this->adminRepository->store($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return void
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|ApplicationAlias
     */
    public function edit(string $id)
    {
        $this->authorize('update_admins');
        $admin    = $this->adminRepository->show($id);
        $roles    = $this->roleRepository->findBy();
        $statuses = Status::cases();
        $levels   = $this->levelRepository->list();
        return view('dashboard.admins.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminRequest $request
     * @param int|null     $id
     * @return void
     */
    public function update(AdminRequest $request, ?int $id)
    {
        $this->authorize('update_admins');
        $this->adminRepository->update($request->validated(), $id);
    }



    public function destroy(string $id)
    {
        $this->authorize('delete_admins');
        $this->adminRepository->destroy($id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function admins(string $id)
    {
        $this->authorize('show_admins');
        $this->roleRepository->admins($id);
    }

    /**
     * @param UpdateProfileRequest $request
     * @return void
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $this->adminRepository->updateProfile($request->validated());
    }

    /**
     * @param Request $request
     * @return void
     */
    public function updatePassword(Request $request){
        $data = $request->validate([
            'password'             => ['required','string','min:6','max:255','confirmed'],
            'password_confirmation' => ['required','same:password'],
        ]);
        $user = auth('admin')->user();

        if ($user) {
            $user->update($data);
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
