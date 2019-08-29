@extends('main')

@section('title', '| All Users')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Users</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('admin_users.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New User</a>        
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div> <!--end of row-->

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>isAdmin</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Created At</th>
                    <th></th>
                </thead>

                <tbody>
                
                    @foreach ($users as $user)

                        <tr>
                            <th>{{ $user->id }}</th>
                            <td>{{ $user->isAdmin }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->password }}</td>
                            <td>{{ date('M j, Y h:ia', strtotime($user->created_at)) }}</td>
                            <td><a href="{{ route('admin_users.show', $user->id) }}" class="btn btn-primary btn-sm">View</a> 
                            <a href="{{ route('admin_users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {!! $users->links(); !!}
            </div>
        </div>
    </div>

@endsection