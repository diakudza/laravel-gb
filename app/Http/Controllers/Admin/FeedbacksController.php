<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateFeedbacksRequest;
use App\Models\Feedback;
use App\Models\News;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Feedback $feedback)
    {
        $title ='Feedbacks edit';
        return view('admin.Feedbacks.feedbacks',['title' => 'Admin Feedbacks', 'feedback' => $feedback->all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title ='Feedbacks edit';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title ='Feedbacks edit';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        $title ='Feedbacks edit';
        return view('admin.Feedbacks.feedbacksedit', ['feedback' => $feedback, 'title' => $title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        $title ='Feedbacks edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFeedbacksRequest $request, Feedback $feedback)
    {
        $validated = $request->validated();
        if(!$request->has('like')){
            $validated['like'] = 0;
        }
        $feedback->update($validated);
        return redirect(route('feedbacks.index'))->with(['success'=>'Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback, int $id)
    {
        $feedback->find($id)->delete();
        return redirect(route('feedbacks.index'))->with(['success' => "$id Delete"]);
    }
}
