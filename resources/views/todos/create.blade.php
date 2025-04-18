@extends('layout.master')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="">Create Todo</h5>
        <a href="{{ route('todo.index') }}" class="btn btn-dark">Back</a>
    </div>
    <div class="card-body">
        <form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @error('image') <div class="form-text text-danger"> {{ $message }} </div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control">
                @error('title') <div class="form-text text-danger"> {{ $message }} </div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category_id') <div class="form-text text-danger"> {{ $message }} </div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3"></textarea>
                @error('description') <div class="form-text text-danger"> {{ $message }} </div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Add todo</button>
        </form>
    </div>
</div>
@endsection