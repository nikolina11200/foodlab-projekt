@extends('main')

@section('title', '| DELETE COMMENT?')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-md-offset-2 shadow p-3 mb-5 bg-white rounded">
            <h1>DELETE THIS COMMENT?</h1>
            <p>
                <strong>Name:</strong> {{ $comment->name }}<br>
                <strong>Email:</strong> {{ $comment->email }}<br>
                <strong>Comment:</strong> {{ $comment->comment }}<br>
            </p>
            <form method="POST" action="{{ route('comments.destroy', $comment->id) }}">    
                <input type="submit" value="YES, delete this comment" class="btn btn-danger btn-lg btn-block">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                {{ method_field('DELETE') }}
            </form>
        </div>
    </div>
@endsection