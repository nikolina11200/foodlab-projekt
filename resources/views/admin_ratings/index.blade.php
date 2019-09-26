@extends('main')

@section('title', '| All Ratings')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1 class="niceText">All Ratings</h1>
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
                    <th>Created_at</th>
                    <th>Rating</th>
                    <th>Rateable_id</th>
                    <th>User_id</th>
                    <th></th>
                </thead>

                <tbody>
                
                    @foreach ($ratings as $rating)

                        <tr>
                            <th>{{ $rating->id }}</th>
                            <td>{{ date('M j, Y h:ia', strtotime($rating->created_at)) }}</td>
                            <td>{{ $rating->rating }}</td>
                            <td>{{ $rating->rateable_id }}</td>
                            <td>{{ $rating->user_id }}</td>
                            <td><form  method="POST" action="{{ route('admin_ratings.destroy', $rating->rateable_id) }}">
                            <input type="submit" value="Delete" class="btn btn-danger btn-block">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            {{ method_field('DELETE') }}
                        </form></td>
                        </tr>

                    @endforeach

                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {!! $ratings->links(); !!}
            </div>
        </div>
    </div>

@endsection