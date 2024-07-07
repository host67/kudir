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
        dd($users);
    }

    public function create(UserCreateFormRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        return response()->json([
            'message' => 'Пользователь успешно создан',
            'data' => $user,
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
        echo 'destroy';
    }
}
