@extends('Pages.Layouts.template')
@section('title','home')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' } </script>
    <script type="text/javascript">
            $(document).ready(function() {
            
            // $("body").css("background-color","red");              
            });
    </script>
    <style>
           a:link {
               text-decoration: none;
               color:black;
               
                  }
           .imagesize-cover
                 {
               width: 100%;
               height : 20rem;
                 }
            .card-img-topa {
                width: 100%;
                height: 40vh;
                object-fit: cover;
   
                 }
                 .card-img-left-side {
                width: 120%;
                height: 13vh;
                
   
                 }
            .custom-osfont{
                font-family: 'Open Sans', 'Helvetica', arial, serif;
                }
         </style>
@endsection
@section('body')
        @include('php.timeago')
        <div id="app">
            <div class="container-fluid col-xl-6 col-lg-6 col-md-12 col-xs-12 col-sm-12">
                <articles></articles>
            </div>            
        </div>
        <script src="{{asset('js/app.js')}}"></script>
@endsection