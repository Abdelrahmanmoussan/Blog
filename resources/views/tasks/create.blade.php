@extends('layout.app')

@section('title') Create @endsection

@section('content')

<!-- Create Task Form -->
<form method="POST" action="{{ route('tasks.store') }}" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Title</label>
        <input name="title" type="text" value="{{ old('title') }}" aria-describedby="emailHelp" class="form-control @if ($errors->has('title')) is-invalid @endif">
        @if ($errors->has('title'))
            <span class="alert-danger" style="color: red">{{ $errors->first('title') }}</span>
        @endif
    </div>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" id="exampleFormControlTextarea1" class="form-control @if ($errors->has('description')) is-invalid @endif">{{ old('description') }}</textarea>
        @if ($errors->has('description'))
            <span class="alert-danger" style="color: red">{{ $errors->first('description') }}</span>
        @endif
    </div>

    <button type="submit" class="btn btn-success mt-4">Submit</button>
</form>

@endsection
