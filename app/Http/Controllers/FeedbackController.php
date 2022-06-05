<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;
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
                'feedbacks' => $feedbacks->paginate(15)
            ]);
       // return view('feedback', ['title' => $this->title, 'feedbacks' => $feedbacks->paginate(15)]);
    }

    public function store(StoreFeedbackRequest $request, Feedback $feedback)
    {
        $feedback->fill($request->all());
        $feedback->save();
        return redirect()->back()->with('success', 'added');
        //return view('feedback', ['title' => $this->title, 'feedbacks' => $feedback->paginate(15)]);
    }
}
