<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectRequest;
use App\Repositories\Classes\ProjectRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{JsonResponse, Request};

class ProjectController extends Controller
{
    /**
     * @var ProjectRepository
     */
    protected ProjectRepository $projectRepository;

    /**
     * @param ProjectRepository $projectRepository
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View|JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('view_projects');
        if ($request->ajax()) {
            $projects = $this->projectRepository->findBy($request);
            return response()->json($projects);
        }
        return view('dashboard.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_projects');
        return view('dashboard.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectRequest $request
     * @return void
     */
    public function store(ProjectRequest $request)
    {
        $this->authorize('create_projects');
        $this->projectRepository->store($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(string $id)
    {
        $this->authorize('show_projects');
        $project = $this->projectRepository->show($id);
        return view('dashboard.projects.show', get_defined_vars());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(string $id)
    {
        $this->authorize('update_projects');
        $project = $this->projectRepository->show($id);
        return view('dashboard.projects.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectRequest $request
     * @param string|null    $id
     * @return void
     */
    public function update(ProjectRequest $request, ?string $id)
    {
        $this->authorize('update_projects');
        $this->projectRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_projects');
        $this->projectRepository->destroy($id);
    }
}
