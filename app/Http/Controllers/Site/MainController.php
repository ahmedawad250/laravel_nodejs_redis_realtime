<?php

namespace App\Http\Controllers\Site;

use App\SiteModel;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MainController extends Controller
{
    /**
     * Show home page.
     */
    public function home()
    {
        return view('Site/message', compact('slides', 'features'));
    }
    public function store(Request $request){
        $message = $request->input('message');
        if(isset($message)) {
            $redis = Redis::connection();
            $redis->publish("messages", json_encode(array("status" => 200, "message" => $message)));
        }
    }



}
