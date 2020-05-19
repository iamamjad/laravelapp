@extends('layouts.app')
@section('content')
    
        <div class="well">
          <a href="/company" class="btn btn-default">Go Back</a>
        <h2><a href="/company/{{$record->id}}">{{$record->name}}</a></h1>
          <img style="width: 100%;" src="/storage/cover_images/{{$record->cover_image}}" alt=""> 
          <br><br> 
        <p>{{$record->email}}</p>
        <p>{{$record->website}}</p>
        </div
    
@endsection
