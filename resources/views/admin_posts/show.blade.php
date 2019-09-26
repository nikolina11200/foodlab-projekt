@extends('main')

@section('title', '| View Recipe')

@section('content')


    <div class="row">
        <div class="col-md-8 shadow p-3 mb-5 bg-white rounded">
        <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('images/' . $post->image) }}" height="200" width="250" />
        </div>
        <div class="col-md-8">
            <h2 class="card-title" style="display:inline-block;">{{ $post->title }}</h2>
            <p style="display:inline-block;font-style:italic;color:#aaa;">by {{ $post->users['name'] }}</p>
            <p class="lead">{!! $post->ingridients !!}</p>
            <hr>
            <p class="lead">{!! $post->body !!}</p>
            </div>
        </div>
        <div class='card-footer w-100 text-muted '>
            <h6 style="float:right;">Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h6>
        </div>

        <div id="backend-comments" style="margin-top:50px;">
            <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th width="70px"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post->comments as $comment)
                    <tr>
                        <td>{{ $comment->name }}</td>
                        <td>{{ $comment->email }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->name }}</td>
                        <td>
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i></a>
                            <a href="{{ route('comments.destroy', $comment->id) }}" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

        </div>
        <div class="col-md-4">
            <div class="card">
            <div class="card-body">
                <dl class="dl-horizontal">
                    <dt>Url:</dt>
                    <dd><a href="{{ route('foodlab.single', $post->slug) }}">{{ route('foodlab.single', $post->slug) }}</a></dd>
                </dl>

                <!--pokušaj forme za rating system-->
                <dl class="dl-horizontal">
                <form class="form-horizontal poststars" action="{{route('postStar', $post->id)}}" id="addStar" method="POST">
                {{ csrf_field() }} 
                <div class="stars form-group required">
                <div class="col-sm-12">
                    <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                    <label class="star star-5" for="star-5"></label>
                    <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                    <label class="star star-4" for="star-4"></label>
                    <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                    <label class="star star-3" for="star-3"></label>
                    <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                    <label class="star star-2" for="star-2"></label>
                    <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                    <label class="star star-1" for="star-1"></label>
                </div>
                </div> 
                </form>
                </dl>
                
                <dl class="dl-horizontal">
                <dt>Average Rating:<dd>{{$post->averageRating()}}</dd></dt>
                </dl>
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
                        <a href="{{ route('admin_posts.edit', $post->id) }}" class="btn btn-info btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        <form  method="POST" action="{{ route('admin_posts.destroy', $post->id) }}">
                            <input type="submit" value="Delete recipe" class="btn btn-danger btn-block">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            {{ method_field('DELETE') }}
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <br>
                    <a href="{{ route('admin_posts.index') }}" class="btn btn-default btn-block"><strong>Show all Recipes</strong></a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $('#addStar').change('.star', function(e) {
    $(this).submit();
    });
</script>
@endsection