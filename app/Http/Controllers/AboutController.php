<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $title = 'About';
        $faker = Factory::create();

        return view('about', ['title' => $title,'text' => $faker->realText('700') ]);
    }
}
