
<div class="container-fluid">
    <nav class="navbar shadow-sm sticky-top navbar-toggleable-md navbar-expand-lg navbar-dark text-white p-2" style="background-color: #1E1E20">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
                      
        <div class="collapse navbar-collapse" id="navbarText">  
            <ul class="navbar-nav">

                <a class="navbar-brand w3-allerta mb-0 h1 mr-3 ml-2" href="/">My Blog</a>

                <li class="active nav-item w3-allerta mr-2">
                    <a class="nav-link ai-nav" href="/"><i class="fas fa-home"></i> Home</a>
                </li>
                    
                @if (!Auth::guest())
                    <li class="active nav-item w3-allerta mr-2" ><a class="nav-link ai-nav" href="/write"><i class="far fa-edit"></i> Write</a></li>
                @endif

                <li class="active nav-item dropdown">

                    <a class="nav-link dropdown-toggle w3-allerta ai-nav" href="#" id="navbarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">               
                        Catagories    
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenu">
                        <a class="dropdown-item w3-allerta " href="/cat">All Catagories</a>
                        <hr>
                        <a class="dropdown-item w3-allerta" href="/catagory/Science">Science</a>
                        <a class="dropdown-item w3-allerta" href="/catagory/Tech">Tech</a>
                        <a class="dropdown-item w3-allerta" href="/catagory/Horror">Horror</a>
                        <a class="dropdown-item w3-allerta" href="/catagory/Food">Food</a>
                        <a class="dropdown-item w3-allerta" href="/catagory/Health">Health</a>
                        <a class="dropdown-item w3-allerta" href="/catagory/Fashion">Fashion</a>
                        <a class="dropdown-item w3-allerta" href="/catagory/Stories">Stroies</a>
                        <a class="dropdown-item w3-allerta" href="/catagory/Sports">Sports</a>
                        <a class="dropdown-item w3-allerta" href="/catagory/Movies">Movies</a>
                        <a class="dropdown-item w3-allerta" href="/catagory/TV">TV</a>
                        <a class="dropdown-item w3-allerta" href="/catagory/Others">Others</a>
                    </div>
                </li>
            </ul> 
        </div>
              
        <ul class="navbar-nav text-right">
                    
            @if (Auth::guest())
                <li class="nav-item w3-allerta ai-nav" ><a class="nav-link" href="/login">Login</a></li>
            @else
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle w3-allerta" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Signed in as {{ Auth::user()->name }} 
                    </a>
                                  
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item w3-allerta" href="/profile">Profile</a>
                        @if(Auth::user()->id==15 || Auth::user()->id==29)
                            <a class="dropdown-item w3-allerta" href="/approve/arp">Approve Posts</a>
                            <a class="dropdown-item w3-allerta" href="/approval">Old Approval Page</a>
                            <a class="dropdown-item w3-allerta" href="/users">Show Users</a>
                        @endif
                        <a class="dropdown-item w3-allerta" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                            Logout 
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                           {{ csrf_field() }}
                        </form>
                    </div>
                </li>      
            @endif
        </ul>
    </nav>
</div>


