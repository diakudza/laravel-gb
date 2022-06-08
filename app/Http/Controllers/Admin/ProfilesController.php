<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateNewsRequest;
use App\Http\Requests\Admin\UpdateProfilesRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $title = 'Profiles';
        return view('admin.Profiles.profiles', ['title' => 'Profiles', 'profiles' => $user->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Profile create';
        return view('admin.Profiles.profilescreate', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, News $news)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'avatar' => 'nullable|image'
        ]);

        if ($request->hasFile('avatar')) {
            $date = date('Y-m-d');
            $avatar = $request->file('avatar')->store("img/{$date}");
        }

        $news->fill($request);
        $news->save();
        return redirect(route('new.index'))->with(['success' => 'Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user, int $id)
    {
        $title = 'Profile show';
        return view('admin.Profiles.profile', [
            'profile' => $user->find($id),
            'title' => $title,
            'feedbacks' => $user->find($id)->feedbacks()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user, $id)
    {
        $title = 'Profile edit';
        return view('admin.Profiles.profilesedit', ['profile' => $user->find($id), 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('profiles.index'))->with(['success' => "$user->name is deleted"]);
    }
}
