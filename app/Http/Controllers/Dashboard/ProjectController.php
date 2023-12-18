<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProjectRequest;
use App\Repositories\Classes\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected ProjectRepository $projectRepository;
    public function __construct(
        ProjectRepository $projectRepository,
    )
    {
        //        $this->authorize('view_projects',['index']);
        //        $this->authorize('create_projects', ['create', 'store']);
        //        $this->authorize('show_projects', ['show']);
        //        $this->authorize('update_projects', ['update']);
        //        $this->authorize('delete_projects', ['destroy']);
        $this->projectRepository = $projectRepository;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $projects = $this->projectRepository->findBy($request);
            return response()->json($projects);
        }
        return view('dashboard.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $this->projectRepository->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = $this->projectRepository->show($id);
        return view('dashboard.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, string $id)
    {
        $this->projectRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->projectRepository->destroy($id);
    }
}
