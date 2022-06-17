<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    public function __invoke(Request $request)
    {
        $title = 'About';
        $faker = Factory::create();

        return Inertia::render('Public/About', [
            'title' => $title,
            'text' => $faker->realText('700')
        ]);
    }
}
