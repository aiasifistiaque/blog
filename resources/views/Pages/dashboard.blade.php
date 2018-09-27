@extends('Pages.Layouts.template')

@section('title', (Auth::user() -> name ) )

@section('head')
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/2c7a93b259.js"></script>

        <script>
                $(document).ready(function(){
                        $("#cover-change").hide();
                        $("body").css("background-color","#F5F4F4");
                        $("#preview_image").mouseover(function(){
                                $("#cover-change").show();                
                        })
        
                .mouseleave(function(){
                        $("#cover-change").hide();
                });
        });
        </script>

@endsection

@section('body')
        @include('php.timeago')
  

        <div class="container">

                @if (Auth::guest())
                        <div class="container" style="background:white">
                                <a href="/login">Please log in</a>
                        </div>            
                @else  

                        @foreach ($profile as $user)   
                                <div class="card" style="background:white;">
                                        <div class="w3-display-container">                                
                                                <img src="{{url ($imagename) }}" id="preview_image" class="card-img-top" width="100%" alt="Responsive image" height="250rem" style="object-fit:cover"  >      
                                                <div style="color:black" >
                                                        <a href="javascript:changeProfile()" id="cover-change" class="w3-display-topleft w3-allerta w3-container btn bg-dark text-white">Change cover</a>
                                                </div>
                                        </div>
                                        <div class="card-body"> 
                                                <div class="container">  
                                                        <input type="file" id="file" style="display: none"/>
                                                        <input type="hidden" id="file_name"/>
                                                        <div class="text-right w3-allerta">              
                                                                <small class="card-text text-uppercase text-muted" > Joined {{time_elapsed_string( $user -> created_at) }}</small> 
                                                        </div>
                                                        <h1 class="card-title" style="font-family: 'Open Sans', 'Helvetica', arial, serif;" >{{ $user -> name }}</h1>
                                                        <h4 class="card-text" style="font-family: 'Open Sans', 'Helvetica', arial, serif;" >email: {{ $user -> email }} </h4>   
                                                        <a href='/write' class="btn btn-link">Create a new article</a>
                                                </div>                            
                                        </div> 
                                                                                     
                                </div>
                                
                        @endforeach
                        @foreach ($story as $story)   
                                <br/>
                                <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
                                                <div class="container card" style=" background:white">
                                                        <div class="card-body">
                                                                <div class="text-muted w3-allerta text-uppercase text-right">
                                                                        <small>{{time_elapsed_string($story->poster)}}</small>
                                                                </div>
                                                                <div class="text-muted w3-allerta text-uppercase">
                                                                        <small>{{$story->catagory}}</small>
                                                                </div>
                                                                <h4 class="card-title text-uppercase" style="font-family: 'Open Sans', 'Helvetica', arial, serif;">{{ $story->title }}</h4>
                                                                <div class="col-lg-6 col-md-6 col-sm-7 col-xs-10">

                                                                        @if( $story->permission == 0 )
                                                                                <p class="card-text w3-allerta alert alert-light" role"alert" >Status: Pending</p>
                                                                        @elseif( $story->permission == 1)
                                                                                <p class="card-text w3-allerta alert alert-success" role"alert" >Status: Accepted</p>
                                                                        @elseif( $story->permission ==2 )
                                                                                <p class="card-text w3-allerta alert alert-danger" role"alert" >Status: Rejected</p>
                                                                        @endif
                                                                </div>
                                                
                                                                <p class="card-text"></p>
                                                                <a href="/story/{{ $story -> id }}" class="btn btn-link">View Story</a>
                                                                <a href="/editPost/{{ $story -> id }}" class="btn btn-link">Edit Story</a>
                                                                <a href="/delete/{{ $story -> id }}" class="btn btn-link">Delete Story</a>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        @endforeach
                @endif                 
                <hr>      
        </div>
        @include('Pages.js.profilecover')
@endsection