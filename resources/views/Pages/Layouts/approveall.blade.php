
        @php
if ( $user -> permission == 0 ){
$permission = 'pending';
}elseif ($user -> permission == 1){
$permission = 'approved';
}else{
$permission = 'rejected';
}
@endphp

        <div class="col-xl-3 col-lg-3 col-md-6 col-xm-12 col-sm-12">

           <div class="card">  
             
               <img class="img cardImageShow" style="width:100%; height:30vh; object-fit:cover"  src="{{ $user -> cover }}" alt="Card image cap">

                  <div class="card-body">

                      <h3 class="card-text ai-osfont" >{{ $user -> title }}</h3>
                      <small class="text-muted card-text w3-allerta" style="text-transform:uppercase"> {{ $user -> catagory }} </small>
                                <hr>   
                      <div class="">
                         <div class="w3-allerta" id="statusPost">
                         </div>

                       @if($user -> permission == 0)
                         <p class="w3-allerta">Status:  Pending</p>

                         {!!Form::open((array('url' => '/approvewithoutajax', 'files' => 'true')))!!}
                         {{Form::hidden('id', $user -> id )}}
                         
                         {{Form::submit('Approve',['class'=>'btn btn-link'])}}
                         {{Form::close()}} 

                         {!!Form::open((array('url' => '/rejectwithoutajax', 'files' => 'true')))!!}
                         {{Form::hidden('id', $user -> id )}}
                    
                         {{Form::submit('Reject',['class'=>'btn btn-link'])}}
                         {{Form::close()}}

                         {!!Form::open((array('url' => '/deletewithoutajax/'.$user->id, 'files' => 'true', 'method' => 'delete')))!!}
                    
                         {{Form::submit('Delete',['class'=>'btn btn-link'])}}
                         {{Form::close()}}

                       @elseif($user -> permission == 1)
                         <p class="w3-allerta">Status:   Approved</p>
                         {!!Form::open((array('url' => '/rejectwithoutajax', 'files' => 'true')))!!}
                         {{Form::hidden('id', $user -> id )}}
                    
                         {{Form::submit('Reject',['class'=>'btn btn-link'])}}
                         {{Form::close()}}

                         

                       @elseif($user -> permission == 2)
                         <p class="w3-allerta">Status:   Rejected</p>
                         {!!Form::open((array('url' => '/approvewithoutajax', 'files' => 'true')))!!}
                         {{Form::hidden('id', $user -> id )}}
                    
                         {{Form::submit('Approvel pre rejected',['class'=>'btn btn-link'])}}
                         {{Form::close()}}

                       @endif
              
                       </div>
                       <hr>                      
                       <div class="">                             
                          <a class="text-right" style="color:steelblue" href="/story/{{ $user -> id }}" >Read more.....</a>
                       </div>
                    </div>
                   <div class="card-text text-right">
                     
                         <small class="text-muted card-text">posted on: {{ $user -> poster }}</small>
                     
                    </div>
                 </div>
             </div>
             <hr>
             <br><br>                 
          