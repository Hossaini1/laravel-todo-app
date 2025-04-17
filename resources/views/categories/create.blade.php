@extends('layout.master')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="">Create Category</h5>
        <a href="{{ route('category.index') }}" class="btn btn-dark">back</a>
    </div>
    <div class="card-body">
        <form method="post"  action="{{ route('category.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control">
                @error('title')<div class="form-text text-danger"> {{ $message }} </div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection