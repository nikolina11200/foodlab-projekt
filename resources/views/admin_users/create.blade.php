@extends('main')

@section('title', '| Create new user')

@section('stylesheets')

    <link rel='stylesheet' href='/css/parsley.css' />

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create new user</h1>
            <hr>
            <form  data-parsley-validate method="POST" action="{{ route('admin_users.store') }}">
                <div class="form-group">
                    <label name="isAdmin">isAdmin:</label>
                    <input id="isAdmin" name="isAdmin" class="form-control" maxlength='1'>
                </div>
                <div class="form-group">
                    <label name="name">Name:</label>
                    <input id="name" name="name" class="form-control" maxlength='255' required>
                </div>
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                </div>
                <div class="form-group">
                    <label name="password">Password:</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password:</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <input type="submit" value="Create User" class="btn btn-success btn-lg btn-block">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>

@endsection

@section('scripts')

    <script type="text/javascript" src="/js/parsley.min.js"></script>

@endsection