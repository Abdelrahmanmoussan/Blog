@extends('layout.app')

@section('title') Edit @endsection

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- <form method="POST" action="{{ route('tasks.update', $tasks->id) }}"> --}}

    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input name="title" type="text" value="{{ old('title', $task->title) }}" class="form-control" id="exampleInputEmail1">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ old('description', $task->description) }}</textarea>
        </div>
    {{-- </form> --}}


    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection
