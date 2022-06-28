<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function get(Request $request)
    {
       $count = $request->get('count');
        if ($count=='all')
           return Feedback::get();
       return Feedback::limit($count)->get();
    }
}
