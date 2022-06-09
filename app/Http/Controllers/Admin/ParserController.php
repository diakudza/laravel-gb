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

      return redirect(route('newsIndexA'))->with('success','All task added in query');
    }

    public function startWorker()
    {
        if (env('APP_ENV') === 'local') {
//            $command = 'php /var/www/html/artisan queue:restart ';
//            $res = shell_exec($command); //for local development
        }else {
            shell_exec('php artisan queue:restart'); //for prod
        }
        return redirect()->back()->with('success', 'worker up!');
    }
}
