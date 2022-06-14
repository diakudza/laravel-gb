<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FeedbackController extends Controller
{
    private $title = 'Feedback';

    /**
     * Handle the incoming request.
     * @return \Illuminate\Http\Response
     */
    public function get(Feedback $feedbacks)
    {
        return Inertia::render('Feedbacks/feedbacks',
            [
                'title' => $this->title,
                'feedbacks' => $feedbacks->with('User')->paginate(15)
            ]);
    }

    public function store(StoreFeedbackRequest $request, Feedback $feedback)
    {
        $feedback->fill($request->all());
        $feedback->save();
        return redirect()->back()->with('success', 'added');
    }

    public function update(Request $request, Feedback $feedback)
    {
        $feedback->text = $request->text;
        $feedback->user_id = $feedback->user_id ?? auth()->user()->id;
        $feedback->save();
        return redirect()->back()->with('success', 'updated');
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect(route('feedbacks'))->with('success', 'deleted');
    }
}
