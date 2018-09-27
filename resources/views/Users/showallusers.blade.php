@extends('Pages.Layouts.template')
@section('title','All Users')
@section('head')
    <script>
        $(document).ready(function(){
            $('body').css('background-color','#F5F4F4');
        });
    </script>
@endsection

@section('body')

    <div id="app">
        <div class="">
            <showallusers></showallusers>
        </div>            
    </div>
    
@endsection

@section('jquery')
    
@endsection