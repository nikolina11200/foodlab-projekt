@extends('main')

@section('title', '| All Comments')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1 class="niceText">All Comments</h1>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th>Post_id</th>
                    <th>Created At</th>
                </thead>

                <tbody>
                
                    @foreach ($comments as $comment)

                        <tr>
                            <th>{{ $comment->id }}</th>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>{{ $comment->post_id }}</td>
                            <td>{{ date('M j, Y h:ia', strtotime($comment->created_at)) }}</td>
                            <td><form  method="POST" action="{{ route('admin_comments.destroy', $comment->post_id) }}">
                            <input type="submit" value="Delete" class="btn btn-danger btn-block">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            {{ method_field('DELETE') }}
                        </form>
                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-block btn-info">Edit</a>
                    </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {!! $comments->links(); !!}
            </div>
        </div>
    </div>

@endsection