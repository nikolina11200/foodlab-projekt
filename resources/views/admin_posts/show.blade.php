@extends('main')

@section('title', '| View Recipe')

@section('content')

    <div class="row">
        <div class="col-md-8">
        <img src="{{ asset('images/' . $post->image) }}" height="200" width="200" />
            <h1>{{ $post->title }}</h1>
            <p class="lead">{!! $post->ingridients !!}</p>
            <p class="lead">{!! $post->body !!}</p>
        </div>
        <div class="col-md-4">
            <div class="card">
            <div class="card-body">
                <dl class="dl-horizontal">
                    <dt>Url:</dt>
                    <dd><a href="{{ route('foodlab.single', $post->slug) }}">{{ route('foodlab.single', $post->slug) }}</a></dd>
                </dl>

                <!--pokušaj forme za rating system-->
                <form action="{{route('postStar', $post->id)}}" id="addStar" method="POST">
                <code>{{ csrf_field() }} 
                    <input name="star" type="radio" value="1" /> 
                    <input name="star" type="radio" value="2" /> 
                    <input name="star" type="radio" value="3" /> 
                    <input name="star" type="radio" value="4" /> 
                    <input name="star" type="radio" value="5" />
                    <button type="submit" class="btn btn-primary">Rate</button> 
                </code>
                </form>
                <p>Average Rating:{{$post->averageRating()}}</p>
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('admin_posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        <form  method="POST" action="{{ route('admin_posts.destroy', $post->id) }}">
                            <input type="submit" value="Delete" class="btn btn-danger btn-block">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <br>
                    <a href="{{ route('admin_posts.index') }}" class="btn btn-default btn-block">Show all Posts</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection