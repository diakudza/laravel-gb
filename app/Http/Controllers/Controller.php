<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $news = [
        '1' => ['title' => 'new 1',
            'text' => 'text text texttexttextv texttetextxt',
            'date' => '12-12-2022'],
        '2' => ['title' => 'new 2',
            'text' => 'text text texttexttextv texttetextxt',
            'date' => '15-10-2022'],
        '3' => ['title' => 'new 3',
            'text' => 'text text texttexttextv texttetextxt',
            'date' => '01-12-2022'],
        '4' => ['title' => 'new 4',
            'text' => 'text text texttexttextsadadv texttetextxt',
            'date' => '30-12-2022'],
        '5' => ['title' => 'new 5',
            'text' => 'tsadasdadasdgdfghdfhtextxt',
            'date' => '20-07-2022'],
        '6' => ['title' => 'new 6',
            'text' => 'tsadasdadasdgdfghdfhtextxt',
            'date' => '20-06-2022'],
        '7' => ['title' => 'new 7',
            'text' => 'tsadasdadasdgdfghdfhtextxt',
            'date' => '20-12-2022'],
        '8' => ['title' => 'new 8',
            'text' => 'tsadasdadasdgdfghdfhtextxt',
            'date' => '20-12-2022'],
        '9' => ['title' => 'new 9',
            'text' => 'tsadasdadasdgdfghdfhtextxt',
            'date' => '20-01-2022'],
        '10' => ['title' => 'new 10',
            'text' => 'tsadasdadasdgdfghdfhtextxt',
            'date' => '15-02-2022'],
    ];

    protected $categories = [
        'film' => [1,2],
        'music' => [3,4],
        'podcast' => [5,6],
        'photo' => [7,8],
        'games' => [9,10]

    ];
}
