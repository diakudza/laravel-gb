<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateNewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class NewsController extends Controller
{

    public function index(News $news)
    {
        return Inertia::render('Admin/News/News', [
            'title' => 'Admin news',
            'news' => $news->with('category')->paginate(15),
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/News/NewsCreate', ['categories' => Category::all()]);
    }

    public function store(UpdateNewsRequest $request, News $news)
    {
        $request = $request->validated();
        $news->fill($request);
        $news->save();
        return redirect(route('newsIndexA'))->with(['success'=>'Added']);
    }

    public function show()
    {

    }

    public function edit(News $news)
    {
        return Inertia::render('Admin/News/NewsEdit', ['new' => $news, 'categories' => Category::all()]);
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        $news->fill($request->all());
        $news->save();
        return redirect(route('newsIndexA'))->with(['success'=>'Updated']);
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect(route('newsIndexA'))->with(['success' => "Delete"]);
    }
}
