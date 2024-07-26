<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserCreateFormRequest;
use \App\Http\Requests\UserUpdateFormRequest;
use App\Services\UserService;
use App\Dto\UserCreateDTO;

class UserController extends Controller
{
    protected $userService;

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
        $validated = $request->validated();

        $userDTO = UserCreateDTO::fromArray($validated);

        $user = $this->userService->createUser($userDTO);

        $user->save();

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

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();

            return response()->json([
                'message' => "User {$user->id} successfully deleted",
            ], 204);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Error when deleting user {$user->id}",
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
