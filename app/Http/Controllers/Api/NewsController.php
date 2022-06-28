<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class NewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function get(Request $request)
    {
       $count = $request->get('count');
        if ($count=='all')
           return News::get();
       return News::limit($count)->get();
    }
    public function delete(Request $request)
    {
        try {
            News::destroy($request->get('id'));
            return ('OK');
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }
}
