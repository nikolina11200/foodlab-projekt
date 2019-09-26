@extends('main')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <img src="{{ asset('images/' . $post->image) }}" height="250" width="350" />
        </div>
        <div class="col-md-8 col-md-offset-2 shadow p-3 mb-5 bg-white rounded">
            <h2 class="card-title" style="display:inline-block;">{{ $post->title }}</h2>
            <p style="display:inline-block;font-style:italic;color:#aaa;">by {{ $post->users['name'] }}</p>
            <p>{!! $post->ingridients !!}</p>
            <hr>
            <p>{!! $post->body !!}</p>
        </div>
    </div>

    <div class="row d-flex justify-content-center" style="margin-top:20px;">
        <div class="col-md-8 col-md-offset-2 shadow p-3 mb-5 bg-white rounded">
            <h3 class="comments-ttitle"><i class="fas fa-comment-dots"></i>
            {{ $post->comments()->count() }} Comments</h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->email))) . '?&d=robohash' }}" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ date('F nS, Y - G:i' ,strtotime($comment->created_at)) }}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @if (Auth::check())
    <div class="row d-flex justify-content-center">
        <div id="comment-form" class="col-md-8 col-md-offset-md-2">
        <form method="POST" action="{{ route('comments.store', $post->id) }}">
        {{ csrf_field() }}
            <div class="row">
            <div class="col-md-6">
                <label name="name">Name:</label>
                <input id="name" name="name"  maxlength='255' required class="form-control">
            </div>
            <div class="col-md-6">
                <label name="email">Email:</label>
                <input id="email" name="email"  maxlength='255' required class="form-control">
            </div>
            <div class="col-md-12">
                <label name="comment">Comment:</label>
                <textarea id="comment" name="comment" rows="5" class="form-control" required></textarea>
                <input type="submit" value="Add Comment" class="btn btn-info btn-block">
            </div>
            </div>
        </form>
        </div>
    </div>
    @endif
@endsection
