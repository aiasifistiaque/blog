@extends('Pages.Layouts.template')
@section('title','Approval')
@section('body')

@foreach ($users as $user)
   
       <div class="w3-card-4 w3-hover-shadow" >  

            <a href="/story/{{ $user -> id }}" style="text-decoration:none; color:black">

              <img class="img cardImageShow" style="width:100%"  src="{{ $user -> cover }}" alt="Card image cap">

              <div class="w3-container">

                   <h3 class="w3-allerta" style="text-transform:uppercase">{{ $user -> title }}</h3>
                         <small class="text-muted w3-allerta" style="text-transform:uppercase"> {{ $user -> catagory }} </small>
                   
                  <hr>                          
               <div class="">
                                
                   <a class="text-right" style="color:steelblue" href="/story/{{ $user -> id }}" >Read more.....</a>
               </div>

            </div>

            <footer class="w3-container">
                <p>
                  <small class="text-muted">posted on: {{ $user -> poster }}</small>
                </p>
              </footer>

           </a>
  </div>

      <hr>
      <br>
@endforeach






@endsection