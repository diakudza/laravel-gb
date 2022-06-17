<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\News;
use Faker\Factory;
use Inertia\Inertia;

class MainController extends Controller
{
    public function __invoke(News $news, Feedback $feedback)
    {
        $title = 'Main page';
        $faker = Factory::create();
        if ($max = $news->max('id')) {
            $min = $news->min('id');
            $randNews = $news->where('id', rand($min, $max))->first();
        } else {
            $randNews = ['title' => $faker->realText('10'),
                'text' => $faker->realText('700'),
            ];
        }

        $lastFeedbacks = $feedback->select('id', 'text', 'user_id')->with('user')->orderByDesc('id')->limit('2')->get();
        return Inertia::render('Public/Main', [
            'title' => $title,
            'randNews' => $randNews,
            'lastFeedbacks' => $lastFeedbacks
        ]);

    }
}
