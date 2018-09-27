@extends('Pages.Layouts.template')
@section('title','catagory')
@section('head')
@section('head')

    <script type="text/javascript">
        $(document).ready(function() {          
            $("body").css("background-color","#F5F4F4"); 
        });     
    </script>
    <style>

    
        @media (min-width: 992px) { 
        
            .card-columns {

                    column-count: 5;
                }
           
        }
    </style>

@endsection

@section('body')
    <div id="app">
        <catagory></catagory>
    </div>

@endsection