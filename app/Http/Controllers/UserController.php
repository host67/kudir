<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserCreateFormRequest;
use App\Http\Requests\UserUpdateFormRequest;
use App\Services\UserService;
use Exception;

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

    public function create(UserCreateFormRequest $request)
    {
        try {
            $userDTO = $request->getUserCreateDTO();

            $user = $this->userService->createUser($userDTO);

            return redirect()->route('users.index')->with('success', 'Пользователь создан');

        } catch (Exception $e) {

            if ($e->getCode() == 409) {
                return response()->json(['error' => $e->getMessage()], 409);
            } else {
                return response()->json(['error' => 'Произошла ошибка при регистрации'], 500);
            }
        }
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

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();

            return response()->json([
                'message' => "User $user->id successfully deleted",
            ], 204);
        } catch (Exception $e) {
            return response()->json([
                'message' => "Error when deleting user $user->id",
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
