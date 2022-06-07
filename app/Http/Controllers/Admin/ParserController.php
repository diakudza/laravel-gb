<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\Source;
use App\Services\Contract\Parser;
use App\Services\ParserService;
use Illuminate\Http\Request;
use XMLParser;

class ParserController extends Controller
{
    public function index(Source $source, ParserService $parser)
    {
        $source = $source->where('active', '1')->get();

        foreach ($source as $link) {

            NewsParsing::dispatch($link->url, $link->category_id);
        }
      //  exec('./vendor/bin/sail artisan queue:work');
      return redirect(route('new.index'))->with('success','All task added in query');
    }
}
