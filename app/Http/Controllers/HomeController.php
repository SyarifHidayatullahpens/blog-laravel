<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class HomeController extends Controller
{



    public function index(Request $request)
    {
        $page = 'dashboard';
     
        return view('pages.backend.home.index',compact('page'));

    }
}
