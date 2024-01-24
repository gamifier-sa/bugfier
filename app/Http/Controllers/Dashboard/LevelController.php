<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LevelRequest;
use App\Repositories\Classes\LevelRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{JsonResponse, Request};

class LevelController extends Controller
{
    /**
     * @var LevelRepository
     */
    protected LevelRepository $levelRepository;

    /**
     * @param LevelRepository $levelRepository
     */
    public function __construct(LevelRepository $levelRepository)
    {
        $this->levelRepository = $levelRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|JsonResponse|View
     */
    public function index(Request $request)
    {
        $this->authorize('view_levels');
        if ($request->ajax()) {
            $level = $this->levelRepository->findBy($request);
            return response()->json($level);
        }
        return view('dashboard.levels.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_levels');
        return view('dashboard.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LevelRequest $request
     * @return void
     */
    public function store(LevelRequest $request)
    {
        $this->authorize('create_levels');
        $this->levelRepository->store($request->validated());
    }

    /**
     * @return void
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(string $id)
    {
        $this->authorize('update_levels');
        $level = $this->levelRepository->show($id);
        return view('dashboard.levels.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LevelRequest $request
     * @param string       $id
     * @return void
     */
    public function update(LevelRequest $request, string $id)
    {
        $this->authorize('update_levels');
        $this->levelRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_levels');
        $this->levelRepository->destroy($id);
    }
}
