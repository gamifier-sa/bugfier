<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BugRequest;
use App\Repositories\Classes\{AdminRepository, BugRepository, ProjectRepository, StatusRepository};
use App\Models\Status;
use Illuminate\Http\Request;

class BugController extends Controller
{
    protected BugRepository $bugRepository;
    protected ProjectRepository $projectRepository;
    protected AdminRepository $adminRepository;
    protected StatusRepository $statusRepository;
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
     */
    public function index(Request $request)
    {
        $this->authorize('view_bugs');
        if ($request->ajax()) {
            $bugs = $this->bugRepository->findBy($request);
            return response()->json($bugs);
        }
        return view('dashboard.bugs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create_bugs');
        [$projects, $admins, $statuses] = $this->extracted();
        return view('dashboard.bugs.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BugRequest $request)
    {
        $this->authorize('create_bugs');
        $status = $this->statusRepository->first();

        $data   = $request->validated();
        if (empty($data['status_id']))
        {
            $data['status_id'] = $status->id;
        }
        $this->bugRepository->store($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $this->authorize('show_bugs');
       $bug = $this->bugRepository->find($id);
       return view('dashboard.bugs.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
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
     */
    public function update(BugRequest $request, string $id)
    {
        $this->authorize('update_bugs');
        $this->bugRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_bugs');
        $this->bugRepository->destroy($id);
    }


    /**
     * @return array
     */
    protected function extracted() : array
    {
        $projects = $this->projectRepository->list();
        $admins   = $this->adminRepository->list();
        $statuses = $this->statusRepository->list();
        return [$projects, $admins, $statuses];
    }
}
