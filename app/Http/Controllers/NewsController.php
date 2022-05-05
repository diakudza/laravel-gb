<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    private $title = 'News';
    private $news;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->news = DB::table('news')->simplePaginate(15);
    }

    public function index()
    {
        return view('news', ['title' => $this->title, 'news' => $this->news]);
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

        $title = $request->input('newstitle');
        $text = $request->input('text');

        DB::table('news')->insert(['title' => $title, 'text' => $text, 'created_at' => now()]);
        return view('news', ['title' => 'News', 'news' => $this->news]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = DB::table('news')->where('id', $id)->first();
        return view('news', ['title' => 'news viewer', 'news' => $news]);
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
        //delete news
        DB::table('news')->where('id', $id)->delete();
        return view('news', ['title' => $this->title, 'news' => $this->news]);
    }
}
