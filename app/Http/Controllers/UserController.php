<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserCreateFormRequest;

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

    public function edit($id)
    {
        echo 'edit';
    }

    public function update(Request $request, $id)
    {
        echo 'update';
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();

            return response()->json([
                'message' => "User {$user->id} successfully deleted",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Error when deleting user {$user->id}",
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
