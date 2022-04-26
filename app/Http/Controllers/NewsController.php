<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $title = 'News';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news', ['title' => $this->title, 'single' => 0, 'news' => $this->news, 'categories' => $this->categories]);
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
    public function store(Request $request)
    {
        //add news method

        $news = [
                'title' => $request->input('newstitle'),
                'text' => $request->input('text'),
                'date' => now()
        ];
        $this->news[] = $news;

        return view('news', ['title' => 'News', 'news' => $this->news, 'categories' => $this->categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = $this->news[$id+1];

        return view('news', ['title' =>'news viwer', 'single' => $news, 'news' => $this->news]);
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
    public function update(Request $request, $id)
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
    public function destroy($id)
    {
        //erase news
        var_dump(__METHOD__);
        $this->news;
        unset($this->news[$id]);
        return view('news', ['title' => $this->title, 'single' => 0,'news' => $this->news, 'categories' => $this->categories]);
    }
}
