@extends('main')

@section('title', '| Edit Comment')

@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-md-8 col-md-offset-2">
    <h1 class="niceText">Edit Comment</h1>

    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
{{ method_field('PUT') }}
{{ csrf_field() }}
                    <label name="name">Name:</label>
                    <input id="name" name="name"  maxlength='255' required class="form-control" value="{{ old('name', $comment->name) }}" disabled>

                    <label name="email">Email:</label>
                    <input id="email" name="email" minlength='5' maxlength='255' required class="form-control" value="{{ old('email', $comment->email) }}" disabled>
                    
                    <label name="comment">Comment:</label>
                    <textarea id="comment" name="comment" rows="10"  required class="form-control">{{ old('comment', $comment->comment) }}</textarea>
                    <input type="submit" value="Update comment" class="btn btn-info btn-block" style="margin-top:15px;">
	</form>
</div>
</div>
@endsection