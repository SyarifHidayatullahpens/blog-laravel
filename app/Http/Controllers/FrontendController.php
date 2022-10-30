<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use Carbon\Carbon;

class FrontendController extends Controller
{
   public function index(Request $request){
        $page = 'home';
        $data = Http::withHeaders([
            'Authorization' => 'Bearer '.$request->cookie('token'),
            'ContentType' => 'application/json',
            'Accept' => 'application/json',
        ])->get(env('API_URL').'/v1/posts')->json();
        dd($data);
        $posts = json_decode(json_encode($data))->posts;
        $category = json_decode(json_encode($data))->category;
        // dd($category);
        return view('pages.frontend.home.index', compact('posts','page','category'));
   }

   public function category($title){
        $page = 'category';

        $data = Http::withHeaders([
            'Authorization' => 'Bearer '.$request->cookie('token'),
            'ContentType' => 'application/json',
            'Accept' => 'application/json',
        ])->get(env('API_URL').'/v1/category/{title}')->json();
        // dd($data);
        $title = json_decode(json_encode($data))->category;
       
        return view('pages.frontend.category.index', compact('title', 'page'));
   }
}
