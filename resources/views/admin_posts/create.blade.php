@extends('main')

@section('title', '| Create new recipe')

@section('stylesheets')

    <link rel='stylesheet' href='/css/parsley.css' />
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

    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="niceText">Create new recipe</h1>
            <hr>
            <form  data-parsley-validate method="POST" action="{{ route('admin_posts.store') }}"  enctype="multipart/form-data">
                <div class="form-group">
                    <label name="title">Title:</label>
                    <input id="title" name="title" class="form-control" maxlength='255' required>
                </div>
                <div class="form-group">
                    <label name="slug">Slug:</label>
                    <input id="slug" name="slug" class="form-control" minlength='5' maxlength='255' required>
                </div>
                <div class="form-group">
                    <label name="featured_image">Upload your image:</label>
                    <input id="featured_image" name="featured_image" rows="10" type="file">
                </div>
                <div class="form-group">
                    <label name="ingridients">Ingridients:</label>
                    <textarea id="ingridients" name="ingridients" rows="10" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label name="body">Preparation:</label>
                    <textarea id="body" name="body" rows="10" class="form-control" required></textarea>
                </div>
                <input type="submit" value="Create Recipe" class="btn btn-info btn-lg btn-block">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript" src="/js/parsley.min.js"></script>

@endsection