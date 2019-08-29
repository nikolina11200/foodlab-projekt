
@extends('main')

@section('title', '| Homepage')

@section('content') 
            <div class="row">
                <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">Welcome to FoodLab</h1>
                    <p class="lead">Thank you for visiting my FoodLab page</p>
                    <a class="btn btn-primary btn-lg" href="#" role="button">Popular post</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">

                @foreach($posts as $post)
                
                    <div class="post">
                    <img src="{{ asset('images/' . $post->image) }}" height="200" width="200" />
                        <h3>{{ $post->title }}</h3>
                        <p>{!! $post->ingridients !!}</p>
                        <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('foodlab/'.$post->slug) }}" class="btn btn-primary">Read more</a>
                    </div>
                    @if (Auth::check())
                    <div id="stars">
                <form action="{{route('postStar', $post->id)}}" id="addStar" method="POST">
                {{ csrf_field() }} 
                    <input name="star" type="radio" value="1" /> 
                    <input name="star" type="radio" value="2" /> 
                    <input name="star" type="radio" value="3" /> 
                    <input name="star" type="radio" value="4" /> 
                    <input name="star" type="radio" value="5" />
                    <button type="submit" class="btn btn-primary">Rate</button> 
                
                </form>
                </div>
                <p>Average Rating:{{$post->averageRating()}}</p>
                @endif
                <hr>
                @endforeach    
                </div>
                

                <div class="col-md-3 col-md-offset-1">
                    <h2>Sidebar</h2>
                </div>
            </div>
        @endsection