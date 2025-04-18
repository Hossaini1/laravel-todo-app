<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Category;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // public function index(){
    //     $todos = Todo::all();

    //     return view('todos.index',compact('todos'));

    // }

    public function create()
    {
        $categories = Category::all();
        return view('todos.create', compact('categories'));
    }

    public function store(Request $req)
    {
        //   dd($req->all());

        $req->validate([
            'image' => 'required |image|max:2000',
            'title' => 'required | min:3|string',
            'description' => 'required|string',
            'category_id' => 'required|integer'

        ]);

        $filename=time().'_'.$req->image->getClientOriginalName();
        $req->image->storeAs('/images',$filename);

        Todo::create([
            'image'=>$filename,
            'title'=>$req->title,
            'description'=>$req->description,
            'category_id'=>$req->category_id
        ]);
    }
}
