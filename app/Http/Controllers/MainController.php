<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id = null)
    {
        $title = 'MainController';
        $max = DB::table('news')->max('id');
        $min = DB::table('news')->min('id');;
        $randNews = DB::table('news')->where('id', rand($min, $max))->first();
        return view('main', ['title' => $title, 'randNews' => $randNews]);
    }
}
