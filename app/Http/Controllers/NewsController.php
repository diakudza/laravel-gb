<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    private $title = 'News';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(News $news)
    {
        return view('news', ['title' => $this->title, 'news' => $news->simplePaginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //call crete view
        $title = "News create";
        return view('newscreate', ['title' => $title]);
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
            'title' => ['required', 'string', 'min:10'],
            'text' => ['required', 'string', 'min:20'],
        ]);
        $validated = $request->except();
        $news->created_at = now();
        $news->fill($validated);
        $news->save();
        return view('news', ['title' => 'News', 'news' => $news->simplePaginate(15)]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news', ['title' => 'news viewer', 'news' => $news->simplePaginate(15)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit single new
        return view('news', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //update single new
        var_dump(__METHOD__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        return view('news', ['title' => $this->title, 'news' => $news->simplePaginate(15)]);
    }
}
