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
    protected UserRepository $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        $this->authorize('create_users');
        return view('dashboard.users.create');
    }
    /**
     * @param UserRequest $request
     */
    public function store(UserRequest $request)
    {
        $this->authorize('create_users');
        $this->userRepository->store($request->validated());
    }

    public function edit($id)
    {
        $this->authorize('update_users');
        $user = $this->userRepository->show($id);
        return view('dashboard.users.edit',compact('user'));
    }

    /**
     * @param UserRequest $request
     * @param              $id
     */
    public function update(UserRequest $request, $id)
    {
        $this->authorize('update_users');
        $this->userRepository->update($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorize('delete_users');
        $this->userRepository->destroy($id);
    }
}
