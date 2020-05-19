@extends('layouts.app')
@section('content')
 <h1>Create Company</h1>
 
 {!! Form::open(['action' => 'CompanyController@store','method'=> 'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
        {{FORM::label('name','Name')}}
        {{FORM::text('name','',['class'=>'form-control','placeholder'=>'Name'])}}
    </div>

    <div class="form-group">
        {{FORM::label('email','Email')}}
        {{FORM::text('email','',['class'=>'form-control','placeholder'=>'Email'])}}
    </div>

    <div class="form-group">
        {{FORM::label('website','Website')}}
        {{FORM::text('website','',['class'=>'form-control','placeholder'=>'Website'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
      
        {{FORM::submit('Submit',['class'=>'btn btn-primary'])}}
    
{!! Form::close() !!}
@endsection
