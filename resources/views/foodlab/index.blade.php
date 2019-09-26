@extends('main')

@section('title', '| Foodlab')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 style="text-align:center;" class="niceText">Recipes</h1>
        </div>
    </div>

    @foreach ($posts as $post)
    <div class="row">
    <div class="col-md-12 col-md-offset-2">
    <div class="card flex-row flex-wrap shadow p-3 mb-5 rounded">
        <div class="col-sm-3">
		<div class="card border-0">
            <img src="{{ asset('images/' . $post->image) }}" height="200" width="200" class="img-thumbnail"/>
        </div>
                <p class="averageText">Average Rating:{{$post->averageRating()}}</p>
        </div>
        <div class="col-sm-8">
		<div class="card-block px-2">
            <h2 class="card-title" style="display:inline-block;">{{ $post->title }}</h2>
            <p style="display:inline-block;font-style:italic;color:#aaa;">by {{ $post->users['name'] }}</p>
            <p class="card-text">{!! $post->ingridients !!}</p>
            <hr>
            <p class="card-text">{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>

            <a href="{{ route('foodlab.single', $post->slug) }}" class="btn btn-info">Read More</a>
        </div>
        </div>
        <div class="card-footer w-100 text-muted ">
            <h6 style="float:right;">Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h6>
        </div>
        </div>
        </div>
</div>
    @endforeach

    <div class="row">
        <div class="col-md-12" >
            <div class="d-flex justify-content-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>

@endsection
