@extends('main')

@section('title', "| $post->title")

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{ asset('images/' . $post->image) }}" height="200" width="200" />
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->ingridients !!}</p>
            <p>{!! $post->body !!}</p>
           
        </div>
    </div>

@endsection
