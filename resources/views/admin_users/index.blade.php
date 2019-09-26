@extends('main')

@section('title', '| All Users')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1 class="niceText">All Users</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('admin_users.create') }}" class="btn btn-lg btn-block btn-info btn-h1-spacing">Create New User</a>        
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
                            <td><a href="{{ route('admin_users.show', $user->id) }}" class="btn btn-info btn-sm">View</a> 
                            <a href="{{ route('admin_users.edit', $user->id) }}" class="btn btn-danger btn-sm">Edit</a></td>
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