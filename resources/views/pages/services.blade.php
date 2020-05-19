@extends('layouts.app')
@section('content')


<div class="container">

<div class="jumbotron">
  
<h1>{{$title}}</h1>
@if(count($services)>0)

 @foreach($services as $service)
   <li class="list-group-item">{{$service}}</li> 
 @endforeach
@endif
</div>
@endsection