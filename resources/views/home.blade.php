@extends('main')

@section('content')

<div class="container">

@if(\Session::has('error'))

<div class="alert alert-danger">

{{\Session::get('error')}}

</div>

@endif
<br><br><br>
<div class="row">
    <div class="col-md-12 col-md-offset-2 shadow p-3 mb-5 bg-white rounded">
    <div class="panel panel-default">
        <div class="panel-heading" ><h1 class="niceText" style="text-align:center;">Choose user role!</h1></div>
        <div class="row">
        <div class="col-md-6">
    <div class="panel-body">
        <a href="{{url('admin/routes')}}" class="btn btn-danger btn-block">Admin</a>
    </div>
        </div>
        <div class="col-md-6">
        <a href="{{url('/')}}" class="btn btn-info btn-block">Normal user</a>
        </div>
        </div>
</div>
</div>
</div>
</div>
@endsection
