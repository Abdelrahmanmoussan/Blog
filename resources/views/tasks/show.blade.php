@extends('layout.app')

@section('title') Show @endsection

@section('content')

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <h5 class="card-header">{{ $task->title }}</h5>
    <div class="card-body">
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">{{ $task->description }}</p>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        Task Creator Info
    </div>
    <div class="card-body">
        <h5 class="card-title">Name: {{ $task->user->name }}</h5>
        <p class="card-text">Email: {{ $task->user->email }}</p>
        <p class="card-text">Id: {{ $task->user->id }}</p>
    </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position: absolute;
        display: none;
    }
    .rate:not(:checked) > label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }
    .rate > input:checked ~ label {
        color: #ffc700;
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }
    .star-rating-complete {
        color: #c59b08;
    }
</style>

@if(!empty($value->star_rating))
<div class="container">
    <div class="row">
        <div class="col mt-4">
            <p class="font-weight-bold">Review</p>
            <div class="form-group row">
                <div class="col">
                    <div class="rated">
                        @for($i = 1; $i <= $value->star_rating; $i++)
                            <label class="star-rating-complete" title="text">{{ $i }} stars</label>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col">
                    <p>{{ $value->comments }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row">
        <div class="col mt-4">
            <form class="py-2 px-4" action="{{ route('review.store') }}" style="box-shadow: 0 0 10px 0 #ddd;" method="POST" autocomplete="off">
                @csrf
                <p class="font-weight-bold">Review</p>
                <div class="form-group row">
                    <div class="col">
                        <div class="rate">
                            <input type="radio" id="star5" class="rate" name="star_rating" value="5"/>
                            <label for="star5" title="5 stars">5 stars</label>
                            <input type="radio" id="star4" class="rate" name="star_rating" value="4"/>
                            <label for="star4" title="4 stars">4 stars</label>
                            <input type="radio" id="star3" class="rate" name="star_rating" value="3"/>
                            <label for="star3" title="3 stars">3 stars</label>
                            <input type="radio" id="star2" class="rate" name="star_rating" value="2"/>
                            <label for="star2" title="2 stars">2 stars</label>
                            <input type="radio" id="star1" class="rate" name="star_rating" value="1"/>
                            <label for="star1" title="1 star">1 star</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="col">
                        <textarea class="form-control" name="comments" rows="6" placeholder="Comment" maxlength="200"></textarea>
                    </div>
                </div>
                <div class="mt-3 text-right">
                    <button class="btn btn-sm py-2 px-3 btn-info">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

@endsection
