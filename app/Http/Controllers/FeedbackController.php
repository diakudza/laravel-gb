<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    private $title = 'Feedback';
    private $feedbacks ;

    public function __construct() {
        $this->feedbacks = DB::table('feedbacks')->paginate(20);
    }
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request, $id = null)
    {
       /* For file store
       $arrFromFile =  explode("\n",Storage::disk('local')->get('feedback.txt'));;
        foreach ($arrFromFile as $feedback) {
            $temp = explode('|', $feedback);
            $feedbacks[] = [
                'id' => (int)$temp[0],
                'text' => $temp[1],
                'login' => $temp[2],
                'date' => $temp[3],
                ];
        }*/

        return view('feedback', ['title' => $this->title, 'feedbacks' => $this->feedbacks]);
    }

    public function store(Request $request)
    {
        DB::table('feedback')->insert(['userId' => $request->input('userId'), 'te']);
        return view('main', ['title' => $this->title]);
    }
}
