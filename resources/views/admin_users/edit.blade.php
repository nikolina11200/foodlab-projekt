@extends('main')

@section('title', '| Edit User')

@section('content')

<form method="POST" action="{{ route('admin_users.update', $user->id) }}">
{{ method_field('PUT') }}
{{ csrf_field() }}
		<div class="row">
        <div class="col-md-8 mb-3">
                
                    <label name="isAdmin">isAdmin:</label>
                    <input id="isAdmin" name="isAdmin"  maxlength='1' class="form-control" value="{{ old('isAdmin', $user->isAdmin) }}">

                    <label name="name">Name:</label>
                    <input id="name" name="name"  maxlength='255' required class="form-control" value="{{ old('name', $user->name) }}">

                    <label name="email">Email:</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" autofocus>
                
                    <label name="password">Password:</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $user->password) }}" required autocomplete="current-password">
                
        </div>
        <div class="col-md-4 mb-3">
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
                        <a href="{{ route('admin_users.show', $user->id) }}" class="btn btn-danger btn-block">Cancel</a>
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