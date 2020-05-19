@extends('layouts.app')
@section('content')
      @if(count($records)>0)
            @foreach($records as $record)
            <div class="well">
            <div class="row">
            <div class="col-md-4 col-sm-4">
            <img style="width: 100%;" src="/storage/cover_images/{{$record->cover_image}}" alt="">
            </div>
            <div class="col-md-8 col-sm-8">
              <h2><a href="/company/{{$record->id}}">{{$record->name}}</a></h1>
                <p>{{$record->email}}</p>
                <p>{{$record->website}}</p>
                <a class="btn btn-default" href="/company/{{$record->id}}/edit">Edit</a> <br>
                {!! Form::open(['action' => ['CompanyController@destroy',$record->id],'method'=> 'POST','class'=>'pul-right']) !!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                {!! Form::close()!!} 
            </div>   
            </div>  
			

       
        </div>
                @endforeach
              @endif
@endsection
