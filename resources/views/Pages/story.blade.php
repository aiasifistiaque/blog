@extends('Pages.Layouts.template')

@section('title', $story->title )

@section('head')

            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <script>
                $(document).ready(function(){
                    $("img").addClass('img-fluid');
                    $("p").css("font-size","1em");
                    $("p").css("line-height","1.7em");
                    $("img").addClass('story-img');
                    $("img#post-cover").removeClass('img-fluid');
                });
            </script>

            <style>
                .img-fluid{
                    max-width:40vw;
                    max-height:40vh;
                    margin-left: auto;
                    margin-right: auto;
                    display:block;
                }

                .img-fluid-cov{
                    max-width:100%;
                    max-height:auto;
                    object-fit:cover;
                }
            </style>
@endsection

@section('body')
   <div class="container-fluid" >

    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
    
         <div class="card">

        <div class="card-body">
            @if (!Auth::guest())
            
                @if (Auth::user()->id == $story -> writer_id)
                <div class="text-right">
                     <a class="btn btn-link" href="/changepostcover/{{$story->id}}">Edit Cover</a>
                     <a class="btn btn-link" href="/editPost/{{$story->id}}" >Edit Post</a>
                </div>
           @endif
           @endif

           <br>
                <div class="container">
                    <div class="text-uppercase text-muted w3-allerta">
                        <small>{{$story->catagory}}</small>
                    </div>
                    <h1 class="card-title text-uppercase w3-xxlarge" style="font-family: 'Open Sans', 'Helvetica', arial, serif; " >{{ $story -> title }}</h1>
                </div>
            <div class="card">
                <img src="{{ $story->cover }}" id="post-cover" alt="Story Cover" style="width:100%; height:auto; max-height:400px; object-fit:cover">
            </div>
            <br>
        
         <div class="container">
            <div class="offset-md-2">                
                <div class="text-muted text-uppercase w3-allerta">                                  
                    <small class="card-text" >by {{ $story->writer }}</small><br>
                    <small class="card-text">posted on: {{ $story->poster }}</small>
                </div>
            <hr>
            <div class="card-text" id="ppost" style="font-family: 'Open Sans', 'Helvetica', arial, serif;">
                    {!!$story->body!!}
            </div>
            <br> 
            <br>
            <br>
         </div>
        </div>
        </div>
    </div>
    </div>
    
        <hr>
    </div>
    
</div>
     
@endsection  


