<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class News extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id = null)
    {
        $title = 'News';

        $news = [
            '1' => ['title' => 'new 1',
                'text' => 'text text texttexttextv texttetextxt',
                'category' => '',
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
                'date' => '20-12-2022'],
        ];

        if ($id) {
            $news = [$news[$id]];
        }

        return view('news', ['title' => 'news', 'news' => $news]);
    }
}
