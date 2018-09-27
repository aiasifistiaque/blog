@extends('Pages.Layouts.template')
@section('title','home')
@section('head')
    <script type="text/javascript">
            $(document).ready(function() {
              /* $("body").css("background-color","red"); */              
            });
    </script>
    <style>
          
         </style>
@endsection
@section('body')
    <div id="app" class="container">    
        <image-upload></image-upload>
    </div>
@endsection