<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserFromCabinetRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserCabinetController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return Inertia::render('Public/Cabinet', [
            'user' => $user,
            'url' => env('APP_URL')
        ]);
    }

    public function edit(UpdateUserFromCabinetRequest $request, User $user, int $id)
    {
        $user = $user->findOrFail($id)->first();
        $validated = $request->validated();

        if ($request->hasFile('avatar')) {
            $date = date('Y-m-d');
            $validated['avatar'] = $request->file('avatar')->store("/img/{$date}");
        } else {
            unset($validated['avatar']);
        }

        $user->update($validated);

        $user->save();

        return redirect()->back()->with('success', 'Your profile is updated');
    }
}
