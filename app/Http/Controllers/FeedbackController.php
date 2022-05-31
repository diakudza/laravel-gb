<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    private $title = 'Feedback';

    /**
     * Handle the incoming request.
     * @return \Illuminate\Http\Response
     */
    public function get(Feedback $feedbacks)
    {
        return view('feedback', ['title' => $this->title, 'feedbacks' => $feedbacks->paginate(15)]);
    }

    public function store(StoreFeedbackRequest $request, Feedback $feedback)
    {
        $feedback->fill($request->all());
        $feedback->save();
        return view('feedback', ['title' => $this->title, 'feedbacks' => $feedback->paginate(15)]);
    }
}
