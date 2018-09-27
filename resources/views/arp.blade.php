@extends('Pages.Layouts.template')
@section('title','approve')
@section('head')
    
   

@endsection
@section('body')
        @include('php.timeago')
        <div id="app">
            <div class="container-fluid">
                <approval></approval>
            </div>            
        </div>
        
@endsection