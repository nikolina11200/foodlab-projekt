@extends('main')

@section('content')
<br><br><br>
<div class="container-fluid">
  <div class="row content">
  <div class="col-md-2"></div>
  <div class="col-md-8 shadow p-3 mb-5 bg-white rounded">
    <div class="panel panel-default">
        <div class="panel-heading" ><h1 class="niceText" style="text-align:center;">Admin Panel</h1></div>
        <div class="row">
        <div class="col-md-12">
    <div class="panel-body">
        <a href="{{ url('admin/routes/admin_posts') }}" class="btn btn-info btn-block" style="font-size:20px; font-family:'Quicksand';">MANAGE POSTS</a>
    </div>
        </div>
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
        <a href="{{ url('admin/routes/admin_ratings') }}" class="btn btn-info btn-block" style="font-size:20px;font-family:'Quicksand';">MANAGE RATING</a>
        </div>
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
        <a href="{{ url('admin/routes/admin_comments') }}" class="btn btn-info btn-block" style="font-size:20px;font-family:'Quicksand';">MANAGE COMMENTS</a>
        </div>
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
        <a href="{{ url('admin/routes/admin_users') }}" class="btn btn-info btn-block" style="font-size:20px; font-family:'Quicksand';">MANAGE USERS</a>
        </div>
        </div>
        
</div>
</div>
<div class="col-md-2"></div>
  </div>
</div>
@endsection