<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateCommentsRequest;
use App\Http\Requests\StoreUserCommentsRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserCommentsRequest $request, Comment $comment)
    {
        $comment->fill($request->validated());
        $comment->save();
        return redirect()->back()->with('success', 'comment is added');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentsRequest $request, Comment $comment)
    {
        $comment->update($request->validated());

        return redirect(route('comments.index'))->with('success', 'comment is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect(route('comments.index'))->with('success', 'comment is deleted');
    }
}
