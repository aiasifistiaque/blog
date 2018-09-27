@extends('Pages.Layouts.template')
@section('title',Auth::user()->name)
@section('head')
    <script>
        $(document).ready(function(){
            $('body').css('background-color','#F5F4F4');
        });
    </script>
    <style>

    
            @media (min-width: 992px) { 
            
                .card-columns {
    
                        column-count: 2;
                    }
               
            }
        </style>
@endsection

@section('body')

    <div id="app">
        <div class="">
            <user-profile :userid={{ Auth::user()->id }}></user-profile>
        </div>            
    </div>
    
@endsection

@section('jquery')
    
@endsection