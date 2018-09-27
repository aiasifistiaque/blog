@extends('Pages.Layouts.template')
@section('title','approve')
@section('head')
    <script>
         $(document).ready(function(){
             $("body").css("background-color","#F5F4F4");
             $("#accepted").hide();
             $("#rejected").hide();
             $("#pending").hide();
             $("#all").show();

          $("#all-posts").click(function(){

               $("#all-posts").addClass("active");
               $("#accepted-posts").removeClass("active");
               $("#rejected-posts").removeClass("active");
               $("#pending-posts").removeClass("active");
               
               $("#accepted").hide();
               $("#rejected").hide();
               $("#pending").hide();
               $("#all").show();

          });

          $("#accepted-posts").click(function(){

               $("#accepted-posts").addClass("active");
               $("#all-posts").removeClass("active");
               $("#rejected-posts").removeClass("active");
               $("#pending-posts").removeClass("active");

               $("#all").hide();
               $("#rejected").hide();
               $("#pending").hide();
               $("#accepted").show();
            
          });
          $("#rejected-posts").click(function(){

               $("#rejected-posts").addClass("active");
               $("#all-posts").removeClass("active");
               $("#accepted-posts").removeClass("active");
               $("#pending-posts").removeClass("active");


               $("#accepted").hide();
               $("#all").hide();
               $("#pending").hide();
               $("#rejected").show();
            
          });
          $("#pending-posts").click(function(){
               
               $("#pending-posts").addClass("active");
               $("#all-posts").removeClass("active");
               $("#rejected-posts").removeClass("active");
               $("#accepted-posts").removeClass("active");

               $("#accepted").hide();
               $("#rejected").hide();
               $("#all").hide();
               $("#pending").show();
            
          });
         });
     </script>
@endsection
@section('body')
 <div class="container-fluid">
    <ul class="nav nav-pills justify-content-center nav-fill" style="font-size:1.2rem">
        <li class="nav-item">
          <a class="nav-link active" href="#" id="all-posts">All</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="accepted-posts">Accepted</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="rejected-posts">Rejected</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" id="pending-posts">Pending</a>
        </li>
      </ul>
      <hr>


   <div class="container-fluid" id="all">

         
         <div class="row">    
            @foreach ($stories as $user)
                    @include('Pages.Layouts.approveall')
            @endforeach
         </div>
    </div>

   <div class="container-fluid" id="accepted">
      <div class="row">    
          @foreach ($approved as $user)
                  @include('Pages.Layouts.approveall')
          @endforeach
       </div>
  </div>
   

    <div class="container-fluid" id="rejected">
        <div class="row">    
            @foreach ($rejected as $user)
                    @include('Pages.Layouts.approveall')
            @endforeach
         </div>              
     </div>

    <div class="container-fluid" id="pending">
        <div class="row">    
            @foreach ($pending as $user)
                    @include('Pages.Layouts.approveall')
            @endforeach
         </div>
        
    </div>
 </div>

    @endsection