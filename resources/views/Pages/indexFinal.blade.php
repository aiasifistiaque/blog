@extends('Pages.Layouts.template')
@section('title','home')
@section('head')
    <script type="text/javascript">
            $(document).ready(function() {
              /* $("body").css("background-color","red"); */              
            });
    </script>
    <style>
          
            .custom-osfont{
                font-family: 'Open Sans', 'Helvetica', arial, serif;
                }
         </style>
@endsection
@section('body')
        <div id="app">
            <div class="row justify-content-start">
                <div class="col-md-3 ">
                    <div class="container-fluid float-md-left">
                        <div class="row">
                            <p class="font-weight-bold ai-osfont ml-4 mt-2" style="font-size:.9rem">What's New</p>
                        </div>
                        <div class="">                   
                            <home-sidebar></home-sidebar>                       
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-none d-md-block" style="background-color: #1E1E20">
                    <div class="container-fluid"> 
                        <div class="row">
                            <h2 class="text-white">Most Popular</h2>
                        </div>
                        <div class="row">
                            
                            <home-picture-articles></home-picture-articles>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 d-none d-md-block" style="background-color: #CDCDC0">
                    <div class="container-fluid">
                        <div class="row">
                            <h2 class="text-white">The Hottest</h2>
                        </div>
                        <div class="row">
                                <home-articles></home-articles>                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection