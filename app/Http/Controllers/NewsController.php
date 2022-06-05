<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NewsController extends Controller
{
    private $title = 'News';

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(News $news)
    {
        return Inertia::render('News/news',
            [
                'title' => $this->title,
                'news' => $news->paginate(15)
            ]);
        //return view('news', ['title' => $this->title, 'news' => $news->paginate(15)]);
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
     * @param StoreNewsRequest $request
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request, News $news)
    {
        $validated = $request->validated();
        $validated['created_at'] = now();
        $news->fill($validated);
        $news->save();
        return redirect()->back()->with('success', 'Added');
//       /return view('news', ['title' => 'News', 'news' => $news->paginate(15)]);
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('news', ['title' => 'news viewer', 'news' => $news->paginate(15)]);
    }

    /**
     * Show the form for editing the specified resource.
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
        return redirect()->back()->with('success', 'Deleted');
       // return view('news', ['title' => $this->title, 'news' => $news->paginate(15)]);
    }
}
