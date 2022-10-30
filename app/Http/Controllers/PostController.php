<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use DataTables;
use Storage;

class PostController extends Controller
{
    public function index(Request $request){
        $page = 'posts';
        $data = Http::withHeaders([
            'Authorization' => 'Bearer '.$request->cookie('token'),
            'ContentType' => 'application/json',
            'Accept' => 'application/json',
        ])->get(env('API_URL').'/v1/posts')->json();
        // dd($data);
        $posts = json_decode(json_encode($data))->posts;
        if($request->ajax()){
            return DataTables::of($posts)
                            ->addColumn('title', function($row){
                                return $row->title;
                            })
                            ->addColumn('category', function($row){
                                return $row->category->name;
                            })
                            ->addColumn('user', function($row){
                                return $row->user->username;
                            })
                            ->addColumn('action', function($row){

                                $btn = '<a href="'.route('posts.edit',$row->id).'" data-original-title="Edit" class="edit btn btn-primary btn-sm"><span><i class="fa-regular fa-pen-to-square"></i></span></a>&nbsp;';
                                $btn .= '<a href="'.route('posts.show',$row->id).'" class="btn btn-succeess btn-sm btn-info btn-show"><span><i class="fa-solid fa-eye text-white"></i></span></a>';
                                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  onclick="deleteItem(this)" data-name="'.$row->title.'" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm"><span><i class="fa-solid fa-trash text-white"></i></a>';

                                 return $btn;
                            })
                            ->rawColumns(['action'])
                            ->addIndexColumn()
                            ->make(true);
            }
            return view('pages.backend.posts.index', compact('posts','page'));
    }

    public function create() {
        $page = 'posts';
        return view('pages.backend.posts.create',compact('page'));
    }

    public function edit($id, Request $request) {
        $page = 'posts';
        $data = Http::withHeaders([
            'Authorization' => 'Bearer '.$request->cookie('token'),
            'ContentType' => 'application/json',
            'Accept' => 'application/json',
        ])->get(env('API_URL').'/v1/posts/'.$id.'/edit')->json();

        // dd($data);
        $posts      = json_decode(json_encode($data))->post;
        $category   = json_decode(json_encode($data))->category;
        $users   = json_decode(json_encode($data))->user;
        return view('pages.backend.posts.edit', compact('page','posts','category','users'));
        
    }
}
