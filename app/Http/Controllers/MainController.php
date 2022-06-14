<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     * @return \Illuminate\Http\Response
     */
    public function __invoke(News $news, Feedback $feedback)
    {
        $title = 'Main page';
        $max = $news->max('id');
        $min = $news->min('id');;
        $randNews = $news->where('id', rand($min, $max))->first();
        $lastFeedbacks = $feedback->select('id', 'text', 'user_id')->orderByDesc('id')->limit('2')->get();
        return Inertia::render('main', [
            'title' => $title,
            'randNews' => $randNews,
            'lastFeedbacks' => $lastFeedbacks
        ]);
//        return view('main', ['title' => $title, 'randNews' => $randNews, 'lastFeedbacks' => $lastFeedbacks]);
    }
}
