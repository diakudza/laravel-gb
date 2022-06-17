<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateFeedbacksRequest;
use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FeedbacksController extends Controller
{
    public function index(Feedback $feedback)
    {
        return Inertia::render('Admin/Feedbacks/Feedbacks',['feedbacks' => $feedback->with('User')->paginate(20) ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Feedbacks/FeedbackCreate',['users'=> User::select('id','name')->get()]);
    }

    public function store(StoreFeedbackRequest $request, Feedback $feedback)
    {
        $request = $request->validated();
        $feedback->fill($request);
        $feedback->save();
        return redirect(route('feedbacks.store'))->with(['success'=>'Added']);
    }

    public function show(Feedback $feedback)
    {
        $title ='Feedbacks edit';

    }

    public function edit(Feedback $feedback)
    {
        return Inertia::render('Admin/Feedbacks/FeedbackEdit', ['feedback' => $feedback, 'users'=> User::select('id','name')->get()]);
    }

    public function update(UpdateFeedbacksRequest $request, Feedback $feedback)
    {
        $validated = $request->validated();
        if(!$request->has('like')){
            $validated['like'] = 0;
        }
        $feedback->update($validated);
        return redirect(route('feedbacks.index'))->with(['success'=>'Updated']);
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect()->back()->with(['success' => "Feedback is deleted"]);
    }
}
