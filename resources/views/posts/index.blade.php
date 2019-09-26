@extends('main')

@section('title', '| All Recipes')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1 class="niceText">All Recipes</h1>
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
                    <th>Title</th>
                    <th>Preparation</th>
                    <th>Body</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th></th>
                </thead>

                <tbody id='tbody'>
                
                    @foreach ($posts as $post)

                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{!! $post->ingridients !!}</td>
                            <td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
                            <td><img src="{{ asset('images/' . $post->image) }}" height="200" width="200" /></td>
                            <td>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</td>
                            <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
                        </tr>

                    @endforeach

                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<!--search ajax-->
<script type="text/javascript">
            const search = document.getElementById('search');
            const tableBody = document.getElementById('tbody');
            function getContent(){
            
            const searchValue = search.value;
            
                const xhr = new XMLHttpRequest();
                xhr.open('GET','{{route('search')}}/?search=' + searchValue ,true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function() {
                    
                    if(xhr.readyState == 4 && xhr.status == 200)
                    {
                        tableBody.innerHTML = xhr.responseText;
                    }
                }
                xhr.send()
            }
            search.addEventListener('input',getContent);
        </script>
@endsection