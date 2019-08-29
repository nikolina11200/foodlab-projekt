@extends('main')

@section('title', '| View User')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $user->name }}</h1>
            <p class="lead">{{ $user->email }}</p>
            <p class="lead">{{ $user->password }}</p>
        </div>
        <div class="col-md-4">
            <div class="card">
            <div class="card-body">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($user->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($user->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('admin_users.edit', $user->id) }}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        <form  method="POST" action="{{ route('admin_users.destroy', $user->id) }}">
                            <input type="submit" value="Delete" class="btn btn-danger btn-block">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <br>
                    <a href="{{ route('admin_users.index') }}" class="btn btn-default btn-block">Show all Users</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection