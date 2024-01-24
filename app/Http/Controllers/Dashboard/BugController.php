<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BugRequest;
use App\Repositories\Classes\{AdminRepository, BugRepository, ProjectRepository, StatusRepository};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BugController extends Controller
{
    /**
     * @var BugRepository
     */
    protected BugRepository $bugRepository;

    /**
     * @var ProjectRepository
     */
    protected ProjectRepository $projectRepository;

    /**
     * @var AdminRepository
     */
    protected AdminRepository $adminRepository;

    /**
     * @var StatusRepository
     */
    protected StatusRepository $statusRepository;

    /**
     * @param BugRepository     $bugRepository
     * @param ProjectRepository $projectRepository
     * @param AdminRepository   $adminRepository
     * @param StatusRepository  $statusRepository
     */
    public function __construct(
        BugRepository $bugRepository,
        ProjectRepository $projectRepository,
        AdminRepository $adminRepository,
        StatusRepository $statusRepository,
    )
    {
        $this->bugRepository     = $bugRepository;
        $this->projectRepository = $projectRepository;
        $this->adminRepository   = $adminRepository;
        $this->statusRepository  = $statusRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View|JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('view_bugs');
        if ($request->ajax()) {
            $bugs = $this->bugRepository->findBy($request);
            return response()->json($bugs);
        }
        $statuses = $this->statusRepository->list();
        $admins   = $this->adminRepository->list();
        return view('dashboard.bugs.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_bugs');
        [$projects, $admins, $statuses] = $this->extracted();
        return view('dashboard.bugs.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     * @param BugRequest $request
     * @return void
     */
    public function store(BugRequest $request)
    {
        $this->authorize('create_bugs');
        $status = $this->statusRepository->first();
        $data   = $request->validated();
        if (empty($data['status_id']))
            $data['status_id'] = $status->id;
        $this->bugRepository->store($data);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(string $id)
    {
       $this->authorize('show_bugs');
       $bug = $this->bugRepository->find($id);
       return view('dashboard.bugs.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View
     */
    public function edit(string $id)
    {
        $this->authorize('update_bugs');
        $bug      = $this->bugRepository->show($id);
        [$projects, $admins, $statuses] = $this->extracted();
        return view('dashboard.bugs.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BugRequest $request
     * @param int|null   $id
     * @return void
     */
    public function update(BugRequest $request, ?int $id)
    {
        $this->authorize('update_bugs');
        $this->bugRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_bugs');
        $this->bugRepository->destroy($id);
    }

    /**
     * @param string $id
     * @return Application|Factory|View
     */
    public function updateExpForm(string $id)
    {
        $bug = $this->bugRepository->show($id);
        return view('dashboard.bugs.update-exp', get_defined_vars());

    }

    /**
     * @param string $id
     * @return void
     */
    public function updateExp(string $id)
    {
        $this->bugRepository->updateExp($id, 'exp', request('exp'));
    }

    /**
     * @return array<mixed, mixed>
     */
    protected function extracted() :array
    {
        $projects = $this->projectRepository->list();
        $admins   = $this->adminRepository->list();
        $statuses = $this->statusRepository->list();
        return [$projects, $admins, $statuses];
    }
}
