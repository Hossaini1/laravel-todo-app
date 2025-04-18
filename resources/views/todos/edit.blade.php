@extends('layout.master')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="">Edit Todo</h5>
        <a href="{{ route('todo.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <div class="card-body">
        <form action="{{ route('todo.update', ['todo'=>$todo->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @error('image') <div class="form-text text-danger"> {{ $message }} </div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ $todo->title }}" class="form-control">
                @error('title') <div class="form-text text-danger"> {{ $message }} </div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option selected {{ $todo->category_id == $category->id ? 'selected':'' }} value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id') <div class="form-text text-danger"> {{ $message }} </div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3" >{{ $todo->description }}</textarea>
                @error('description') <div class="form-text text-danger"> {{ $message }} </div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection