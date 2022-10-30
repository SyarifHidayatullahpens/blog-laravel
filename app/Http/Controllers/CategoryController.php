<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use DataTables;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $page = 'units';
        $data = Http::withHeaders([
            'Authorization' => 'Bearer '.$request->cookie('token'),
            'ContentType' => 'application/json',
            'Accept' => 'application/json',
        ])->get(env('API_URL').'/v1/categories')->json();
        // dd($data);
        $categories = json_decode(json_encode($data))->data;

        if($request->ajax()){
            return DataTables::of($categories)
                            ->addColumn('name', function($row){
                                return $row->name;
                            })
                            ->addColumn('action', function($row){

                                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" onclick="updateItem(this)" data-name="'.$row->name.'" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm"><span><i class="fa-regular fa-pen-to-square"></i></span></a>';
                                $btn .= '&nbsp;';
                                $btn .= '<a href="'.route('categories.show',$row->id).'" title="Detail" class="btn btn-succeess btn-sm rounded btn-info"><span><i class="fa-solid fa-eye text-white"></i></span></a>';
                                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  onclick="deleteItem(this)" data-name="'.$row->name.'" data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm"><span><i class="fa-solid fa-trash text-white"></i></a>';

                                 return $btn;
                            })
                            ->rawColumns(['action'])
                            ->addIndexColumn()
                            ->make(true);
            }
            return view('pages.backend.category.index', compact('page'));
    }

    public function show(Request $request,$id)
    {
        
        return view('pages.inventories.unit.show',compact('data','page','unit'));
    }

}
