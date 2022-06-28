<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfilesRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function get(Request $request)
    {
        $email = $request->get('email');
        return User::where('email', $email)->first();
    }

    public function put(UpdateProfilesRequest $request)
    {
        $user = User::find(auth()->id());
        $user->fill($request->validated());
        $user->saveOrFail();
        return ('Updated');
    }
}
