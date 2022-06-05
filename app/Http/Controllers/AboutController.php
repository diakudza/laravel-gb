<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function __invoke(Request $request)
    {
        $title = 'About';
        $faker = Factory::create();

        return Inertia::render('About', [
            'title' => $title,
            'text' => $faker->realText('700')
        ]);
       // return view('about', ['title' => $title,'text' => $faker->realText('700') ]);
    }
}
