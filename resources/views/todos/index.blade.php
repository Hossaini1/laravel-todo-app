@extends('layout.master')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="">Todos</h5>
            <a href="{{ route('todo.create') }}" class="btn btn-secondary">Create todo</a>
        </div>
        <div class="card-body">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todos as $todo)
                        {{-- {{ dd( asset('images/'. $todo->image)  ) }} --}}
                        <tr>
                            <td><img class="rounded" width="90" src="{{ asset('images/' . $todo->image) }}"
                                    alt="category image"></td>
                            <td>{{ $todo->title }}</td>
                            <td>{{ $todo->category->title }}</td>
                            <td>
                                <a href="{{ route('todo.show', ['todo' => $todo->id]) }}"
                                    class="btn btn-sm btn-info">Show todo</a>
                                @if ($todo->status)
                                    <button disabled class="btn btn-sm btn-outline-muted">Completed</button>
                                @else
                                    <a href="{{ route('todo.completed', ['todo' => $todo->id]) }}"
                                        class="btn btn-sm btn-success ">Done ?</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $todos->links('layout.paginate') }}
        </div>
    </div>
@endsection
