<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TodoController extends Controller
{
    public function index()
    {

        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function show(Todo $todo)
    {

        // dd($todo);
        return view('todos.show', compact('todo'));
    }

    public function completed(Todo $todo)
    {

        // dd($todo);
        $todo->update([
            'status' => 1
        ]);

        return redirect()->route('todo.index');
    }

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

        $filename = time() . '_' . $req->image->getClientOriginalName();
        $req->image->storeAs('/images', $filename);

        Todo::create([
            'image' => $filename,
            'title' => $req->title,
            'description' => $req->description,
            'category_id' => $req->category_id
        ]);

        return redirect()->route('todo.index');
    }

    // Todo edit
    public function edit(Todo $todo)
    {
        // dd($todo);
        $categories = Category::all();

        return view('todos.edit', compact('todo', 'categories'));
    }
    // Todo update
    public function update(Todo $todo, Request $req)
    {
        // dd($todo, $req->all());
        $req->validate([
            'image' => 'nullable|max:2000|image',
            'title' => 'required | min:3|string',
            'description' => 'required|string',
            'category_id' => 'required|integer'
        ]);

        // dd($req->hasFile('image'));

        if ($req->hasFile('image')) {
            Storage::delete('images/'. $todo->image);

            $filename=time().'_'.$req->image->getClientOriginalName();
            $req->image->storeAs('/images',$filename);
        }

        $todo->update([
            'image'=>$req->hasFile('image')?$filename:$todo->image,
            'title'=>$req->title,
            'description'=>$req->description,
            'category_id'=>$req->category_id
        ]);

        return redirect()->route('todo.index');
    }

    public function destroy(Todo $todo){
        $todo->delete();
        return redirect()->route('todo.index');
    }
}
