@extends('layout.app')

@section('title') Index @endsection

@section('content')

@if (Session::has('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ Session::get('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div>
    <div class="container">
        <div class="text-center mt-3">
            <a href="{{ route('tasks.create') }}" type="button" class="btn btn-success">Create Task</a>
        </div>

        <div class="text-center mt-3">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Posted By</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->user->name }}</td>
                        <td>{{ $task->created_at }}</td>

                        <td>
                            <a href="{{ route('tasks.show', $task->id) }}" type="button" class="btn btn-info">View</a>

                            @if (auth()->id() == $task->user_id)
                            <a href="{{ route('tasks.edit', $task->id) }}" type="button" class="btn btn-primary">Edit</a>
                            <form style="display: inline" method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<div>
    {{ $tasks->links() }}
</div>

@endsection
