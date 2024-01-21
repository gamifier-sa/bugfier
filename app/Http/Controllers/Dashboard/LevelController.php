<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\LevelRequest;
use App\Repositories\Classes\LevelRepository;
use Illuminate\Http\Request;

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
     */
    public function create()
    {
        $this->authorize('create_levels');
        return view('dashboard.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LevelRequest $request)
    {
        $this->authorize('create_levels');
        $this->levelRepository->store($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @return never
     */
    public function show()
    {
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $this->authorize('update_levels');
        $level = $this->levelRepository->show($id);
        return view('dashboard.levels.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LevelRequest $request, $id)
    {
        $this->authorize('update_levels');
        $this->levelRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete_levels');
        $this->levelRepository->destroy($id);
    }
}
