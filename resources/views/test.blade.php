<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles2.css') }}" rel="stylesheet">
    
   <script src="https://unpkg.com/axios/dist/axios.min.js"></script>  

   <!-- Latest compiled and minified CSS -->
   

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

      
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar  nav-pills " style="background-color:#1687a7 ">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    
                    <a class="navbar-brand active" href="{{ url('/home') }}" style="margin-left: 70px">
                        Home
                    </a>
                    <a class="navbar-brand" href="{{ route('posts.index') }}" style="margin-left: 10px">
                        Posts
                    </a>
                     <a class="navbar-brand" href="{{ route('friends.index') }}" style="margin-left: 10px">
                        Friends
                        @if (Auth::check())
                          @if((Auth::user()->friendOf()->count()) > 0)
                            <span style="padding: 7px;background-color: #05445c;color: #f2317f;border-radius: 50%">{{Auth::user()->friendOf()->count()}}
                            </span>
                          @endif
                        @endif  
                    </a>
                    <a class="navbar-brand" href="{{ route('chat') }}" style="margin-left: 10px">
                        Messages
                    </a>
  
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="color: #FDFFFC">
                                    {{ Auth::user()->name }} 
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                      <a href="{{ route('posts.index') }}"> <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                       Posts</a>
                                    </li>
                                    <li>
                                      <a href="{{ route('posts.index') }}"> <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                       Friends</a>
                                    </li>
                                    <li>
                                      <a href="{{ route('posts.index') }}"> <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                       Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out" aria-hidden="true"></i>

                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

        @yield('content')
</div>
        <div class="container">
          <div class="col-md-12">
            <hr />
          </div>

          <div class="col-md-12" style="margin-bottom: 20px;">
            <div class="text-center">
          Built with ❤️ by <a href="">Mahmoud Ali</a>
            </div>
          </div>
        </div>
    </div>

    <!-- Scripts -->
    
    
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>

<!--test nav-->

        <div class="container"  style="background-color: #fff">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
</div>
</div> 

        <nav class="navbar navbar-expand-lg navbar-light "  style="background-color:#5c4f74 ">
  <a class="navbar-brand" href="#">{{ config('app.name', 'Laravel') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
     <ul class="navbar-nav nav-pills">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('friends.index') }}">
          Friends
           @if (Auth::check())
                          @if((Auth::user()->friendOf()->count()) > 0)
                            <span style="padding: 7px;background-color: #05445c;color: #f2317f;border-radius: 50%">{{Auth::user()->friendOf()->count()}}
                            </span>
                          @endif
                        @endif  


        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('chat') }}">Messages</a>
      </li>
    </ul>
</div> 
<div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="color: #FDFFFC">
                                    {{ Auth::user()->name }} 
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                      <a href="{{ route('posts.index') }}"> <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                       Posts</a>
                                    </li>
                                    <li>
                                      <a href="{{ route('posts.index') }}"> <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                       Friends</a>
                                    </li>
                                    <li>
                                      <a href="{{ route('posts.index') }}"> <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                       Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out" aria-hidden="true"></i>

                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
</nav>