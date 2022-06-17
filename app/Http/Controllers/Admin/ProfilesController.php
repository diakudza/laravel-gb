<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProfileRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;
use App\Http\Requests\Admin\UpdateProfilesRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfilesController extends Controller
{

    public function index(User $user)
    {
        return Inertia::render('Admin/Profiles/Profiles', ['profiles' => $user->paginate(15), 'url' => env('APP_URL')]);
    }

    public function create()
    {
        return Inertia::render('Admin/Profiles/ProfileCreate');
    }

    public function store(StoreProfileRequest $request, User $user)
    {
        $vaidated = $request->validated();
        if ($request->hasFile('avatar')) {
            $date = date('Y-m-d');
            $vaidated['avatar'] = $request->file('avatar')->store("img/{$date}");
        }

        $user->fill($vaidated);
        $user->save();
        return redirect(route('profiles.index'))->with(['success' => 'Added']);
    }

    public function show(Request $request, User $user, $id)
    {
        $user=$user->where('id', $id)->with('feedbacks')->first();
        return Inertia::render('Admin/Profiles/Profile', [
            'profile' => $user,
            'url' => env('APP_URL')
        ]);
    }

    public function edit(Request $request, User $user, $id)
    {
        return Inertia::render('Admin/Profiles/ProfileEdit', ['profile' => $user->find($id), 'url' => env('APP_URL')]);
    }

    public function update(UpdateProfilesRequest $request, User $user, int $id)
    {

        $user = $user->find($id);

        $validated = $request->validated();
        if ($request->password) {
            $validated['password'] = Hash::make($request->password);
        }
        if ($request->hasFile('avatar')) {
            $date = date('Y-m-d');
            $validated['avatar'] = $request->file('avatar')->store("/img/{$date}");
        }
        $user->fill($validated);
        $user->save();
        return redirect(route('profiles.index'))->with(['success' => 'Updated']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('profiles.index'))->with(['success' => "$user->name is deleted"]);
    }
}
