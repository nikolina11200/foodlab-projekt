
@extends('main')

@section('title', '| Homepage')

@section('content') 
            <div class="row">
                <div class="col-md-12">
                <div class="jumbotron">
                    <h3 style="color:white" class="slideanim">Welcome to...</h3>
                    <img class="logo slideanim" width="55%" height="50%" style="padding-left: 100px;" src="/foodlab.png">
                    <p class="lead slideanim" style="color:white;">Are you a food lover?<br> If your answer is yes<br> then this is the right place<br> for you to start writing
               recipes!<br> Bon apetit!</p>
                    </div>
                </div>
            </div>

                <div class="row">
                <div class="col-md-6 ">
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="/photo-1538253018136-a68f21eda0f8.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/photo-1506354666786-959d6d497f1a.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/photo-1490645935967-10de6ba17061.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/photo-1453831362806-3d5577f014a4.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
            </div>
            <div class="col-md-6" style="background-color:white;" id="smallText">
            <br>
                <p style="margin-bottom:0;">If you want to write,<br> read and rate recipes<br>
            you can by signing into our app!</p>
            </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12 shadow p-3 mb-5 bg-white rounded" >
                <h1 style="font-family:'Quicksand'; text-align:center;"><br>Enjoy reading our newest recipes!<br></h1>
                <!--search forma za average rating-->
                <div class="container col-md-4 offset-md-4" style="margin-top:15px;">
                    <input type="text" class="form-control mr-sm-2 outline" id="search" name="search" value="" placeholder="Search For a Recipe..">
                </div>
            </div>
            </div>
        <div id='tbody'>
            @foreach ($posts as $post)
    <div class="row">
    <div class="col-md-12 col-md-offset-2">
    <div class="card flex-row flex-wrap shadow p-3 mb-5 rounded">
        <div class="col-sm-3">
		<div class="card border-0">
            <img src="{{ asset('images/' . $post->image) }}" height="200" width="250" class="img-thumbnail"/>
        </div>
            <p class="averageText">Average Rating:{{$post->averageRating()}}</p>
        </div>
        <div class="col-sm-8">
		<div class="card-block px-2">
            <h2 class="card-title" style="display:inline-block;">{{ $post->title }}</h2>
            <p style="display:inline-block;font-style:italic;color:#aaa;">by {{ $post->users['name'] }}</p>
            <p class="card-text">{!! $post->ingridients !!}</p>
            <hr>
            <p class="card-text">{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen(strip_tags($post->body)) > 250 ? '...' : "" }}</p>

            <a href="{{ url('foodlab/'.$post->slug) }}" class="btn btn-info">Read more</a>
        </div>
        </div>
        <div class='card-footer w-100 text-muted '>
            <h6 style="float:right;">Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h6>
        </div>
        </div>
        </div>
</div>
    @endforeach
    </div>      
                
        @endsection
        @section('scripts')
        <script>
            $('#addStar').change('.star', function(e) {
            $(this).submit();
            });
        </script>
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