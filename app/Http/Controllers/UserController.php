<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserService;
use App\Http\Requests\UserCreateFormRequest;
use App\Http\Requests\UserUpdateFormRequest;
use App\Http\Requests\UserDeleteFormRequest;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        $users = User::all();
        dd(csrf_token());
        //dd($users);
    }

    /**
     * Create User
     * @param UserCreateFormRequest $request
     * @return RedirectResponse
     */
    public function create(UserCreateFormRequest $request): RedirectResponse
    {
        $userDTO = $request->getUserCreateDTO();

        $user = $this->userService->createUser($userDTO);

        return redirect()->route('users.index')->with('success', 'Пользователь создан');
    }

    public function store()
    {
        echo 'store';
    }

    public function edit(int $id)
    {
        echo 'edit';
    }

    public function update(UserUpdateFormRequest $request, int $id)
    {
        echo 'update';
    }

    /**
     * Delete User
     * @param UserDeleteFormRequest $request
     * @return RedirectResponse
     */
    public function destroy(UserDeleteFormRequest $request): RedirectResponse
    {
        $userDTO = $request->getUserDeleteDTO();

        $result = $this->userService->deleteUser($userDTO);

        if (!$result) {
            return redirect()->route('users.index')->with('error', 'Ошибка удаления пользователя');
        }
        return redirect()->route('users.index')->with('success', 'Пользователь удалён');
     }
}
