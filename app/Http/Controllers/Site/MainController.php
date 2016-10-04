<?php

namespace App\Http\Controllers\Site;

use App\SiteModel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class MainController extends Controller
{
    /**
     * Show home page.
     */
    public function home()
    {

        return view('Site/message', compact('slides', 'features'));
    }



}
