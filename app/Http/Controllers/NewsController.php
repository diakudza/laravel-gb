<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NewsController extends Controller
{
    private $title = 'News';

    public function index(News $news)
    {
        $comments = $news->comments();

        return Inertia::render('Public/News/news',
            [
                'title' => $this->title,

                'news' => $news->with(['Category','Comments','Comments.user'])->paginate(15)
            ]);
    }

    public function create()
    {
        //call crete view
        $title = "News create";
        return view('newscreate', ['title' => $title]);
    }

    public function store(StoreNewsRequest $request, News $news)
    {
        $validated = $request->validated();
        $validated['created_at'] = now();
        $news->fill($validated);
        $news->save();
        return redirect()->back()->with('success', 'Added');
    }

    public function show(News $news)
    {
        return view('news', ['title' => 'news viewer', 'news' => $news->paginate(15)]);
    }

    public function edit($id)
    {
        //edit single new
        return view('news', ['id' => $id]);
    }

    public function update(Request $request, News $news)
    {
        //update single new
        var_dump(__METHOD__);
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->back()->with('success', 'Deleted');
    }
}
