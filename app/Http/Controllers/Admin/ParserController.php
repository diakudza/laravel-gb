<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Contract\Parser;
use App\Services\ParserService;
use Illuminate\Http\Request;
use XMLParser;

class ParserController extends Controller
{
    public function index(Request $request, Parser $parser)
    {
       $xml = $parser->setlink($request->input('url'))->parse()->saveInNewsTable();
        return redirect(route('new.index'));
    }
}
