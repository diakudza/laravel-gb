<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    private $title = 'Feedback';

    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request, Feedback $feedbacks)
    {
        return view('feedback', ['title' => $this->title, 'feedbacks' => $feedbacks->paginate(15)]);
    }

    public function store(StoreFeedbackRequest $request, Feedback $feedback)
    {
        $feedback->fill($request->all());
        $feedback->save();
        return view('main', ['title' => $this->title]);
    }
}
