<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserCreateFormRequest;
use \App\Http\Requests\UserUpdateFormRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        dd(csrf_token());
        //dd($users);
    }

    public function create(UserCreateFormRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);

        $user->save();

        return response()->json([
            'message'   => 'User successfully created',
            'data'      => $user,
            'validated' => $validated,
        ]);
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
        dd($request);
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
