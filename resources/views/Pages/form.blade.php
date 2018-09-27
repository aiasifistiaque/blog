@extends('Pages.Layouts.template')

@section('title','signup')

@section('body')
        @include('Pages.Layouts.header')

        <div class="container">
            
                {!!Form::open(['url' => '/create'])!!}

                {{Form::label('input','First Name')}}

                {{Form::text('firstname', '',['class'=>'form-control','placeholder'=>'firstname'])}}
                {{Form::label('input','Last Name')}}

                {{Form::text('lastname', '',['class'=>'form-control','placeholder'=>'lastname'])}}
                {{Form::label('input','Email')}}

                {{Form::email('email', '',['class'=>'form-control','placeholder'=>'email'])}}
                {{Form::label('input','Password')}}
                {{Form::password('password', ['class'=>'form-control','placeholder'=>'password'])}} <br/>
                {{Form::submit('Submit Data',['class'=>'btn btn-primary btn-block'])}}
                {!!Form::close()!!}
        </div>
@endsection