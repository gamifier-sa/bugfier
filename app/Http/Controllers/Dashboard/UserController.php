<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserRequest;
use App\Repositories\Classes\UserRepository;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Foundation\Application;
use Illuminate\Http\{JsonResponse, Request};

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     * @return Factory|View|Application|JsonResponse
     */
    public function index(Request $request)
    {
        $this->authorize('view_users');
        if ($request->ajax()) {
            $users = $this->userRepository->findBy($request);
            return response()->json($users);
        }
        return view('dashboard.users.index');
    }

    /**
     * @return Factory|View|Application
     */
    public function create()
    {
        $this->authorize('create_users');
        return view('dashboard.users.create');
    }

    /**
     * @param UserRequest $request
     * @return void
     */
    public function store(UserRequest $request)
    {
        $this->authorize('create_users');
        $this->userRepository->store($request->validated());
    }

    /**
     * @param string $id
     * @return Factory|View|Application
     */
    public function edit(string $id)
    {
        $this->authorize('update_users');
        $user = $this->userRepository->show($id);
        return view('dashboard.users.edit',compact('user'));
    }

    /**
     * @param UserRequest $request
     * @param string      $id
     * @return void
     */
    public function update(UserRequest $request, string $id)
    {
        $this->authorize('update_users');
        $this->userRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id)
    {
        $this->authorize('delete_users');
        $this->userRepository->destroy($id);
    }
}
