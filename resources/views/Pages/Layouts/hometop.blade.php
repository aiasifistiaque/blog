<div class="row d-none d-lg-block">
    <div class="col-12">
        <div class="w3-display-container">
            <img src="{{$stories[0]->cover}}" class="card-image-show" style="width:100vw; height:50vh; object-fit:cover" alt="Top Story">
            <div class="w3-display-topleft w3-container w3-allerta" style="text-transform:uppercase; color:white">
                <br/>
                <div class="col-2 d-none d-lg-block">
                    <a href="/catagory/{{$stories[0]->catagory}}"><small class="" style="color:white">{{$stories[0]->catagory}}</small></a><br />
                    <a href="/story/{{ $stories[0] -> id }}" class="w3-xxxlarge">{{$stories[0]->title}}</a>                
                </div>
            </div>
            <div class="">
                <div class="w3-display-topright w3-container w3-allerta">
                    <div class="col-8">
                        <br />
                        <a href="/catagory/{{$stories[1]->catagory}}"><small class="" style="color:turquoise">{{$stories[1]->catagory}}</small></a><br />
                        <a href="/story/{{ $stories[1] -> id }}" class="w3-xlarge" style="color:white">{{$stories[1]->title}}</a>
                        <br />
                        <a href="/catagory/{{$stories[9]->catagory}}"><small class="" style="color:turquoise">{{$stories[9]->catagory}}</small></a><br />
                        <a href="/story/{{ $stories[9] -> id }}" class="w3-xlarge" style="color:white">{{$stories[9]->title}}</a>
                        <br />
                        <a href="/catagory/{{$stories[10]->catagory}}"><small class="" style="color:turquoise">{{$stories[10]->catagory}}</small></a><br />
                        <a href="/story/{{ $stories[10] -> id }}" class="w3-xlarge" style="color:white">{{$stories[10]->title}}</a>
                    </div>
                </div>
            </div>             
        </div>
    </div>
</div>