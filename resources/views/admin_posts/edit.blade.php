@extends('main')

@section('title', '| Edit Recipe')

@section('stylesheets')

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
        selector:'textarea',
        plugins:'lists',
        toolbar: 'numlist bullist'
    });
    </script>

@endsection

@section('content')

<form method="POST" action="{{ route('admin_posts.update', $post->id) }}"  enctype="multipart/form-data">
{{ method_field('PUT') }}
{{ csrf_field() }}
		<div class="row">
        <div class="col-md-8 mb-3">
                
                    <label name="title">Title:</label>
                    <input id="title" name="title"  maxlength='255' required class="form-control" value="{{ old('title', $post->title) }}">

                    <label name="slug">Slug:</label>
                    <input id="slug" name="slug" minlength='5' maxlength='255' required class="form-control" value="{{ old('slug', $post->slug) }}">
                    <br>
                    <label name="featured_image">Upload your image:</label>
                    <input id="featured_image" name="featured_image" rows="10" type="file">
                    <br>
                    <label name="ingridients">Ingridients:</label>
                    <textarea id="ingridients" name="ingridients" rows="10"  required class="form-control">{{ old('ingridients', $post->ingridients) }}</textarea>
                
                
                    <label name="body">Post Body:</label>
                    <textarea id="body" name="body" rows="10" required class="form-control">{{ old('body', $post->body) }}</textarea>
                
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
			<div class="card-body">
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
                        <a href="{{ route('admin_posts.show', $post->id) }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                    <div class="col-sm-6">
                    <input type="submit" value="Save Changes" class="btn btn-success btn-block">
                    </div>
                </div>
			</div>
            </div>
        </div>
    </div>
	</form>
    
@endsection