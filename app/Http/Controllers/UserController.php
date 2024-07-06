<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        dd($users);
    }

    public function create()
    {
        echo 'create';
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
