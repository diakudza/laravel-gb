<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getAll()
    {
        return User::all();
    }

    public function getUser(Request $request)
    {
        return User::find($request->id);
    }
}
