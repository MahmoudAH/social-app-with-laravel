<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
     social media | @yield('title')
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Morris chart -->
   <style type="text/css">
    
    .navbar-custom-menu .dropdown-toggle::after {
      display:none;
   }
   .navbar-custom-menu .dropdown{
    padding: 10px;

   }
  </style>
    <!--laravel object-->
    <script>
      window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
        'user' => Auth::user(),
        'pusherKey' => config('broadcasting.connections.pusher.key'),
      ]) !!};
    </script>

    @yield('styles')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="nav nav-pills  mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ url('home') }}">
                           Home
                         </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('posts/*') ? 'active' : '' }}" href="#">
                          Posts
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('friends') ? 'active' : '' }}" href="{{ url('friends') }}">
                          Friends
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ Request::is('chat') ? 'active' : '' }}" href="{{ url('chat') }}">
                          Chat
                        </a>
                      </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <div class="navbar-custom-menu" style="margin-right: 10px">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user-plus" aria-hidden="true"></i>

              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu" style="width: 500px">
              <li class="header"> You have {{Auth::user()->friendOf->count()}} request of freinds</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu" >
                  @if( Auth::user()->friendOf->count() > 0 )
                   @foreach(Auth::user()->friendOf as $request)
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        {{$request->name}}
                        <small>
                          <button class="btn btn-info" onclick="event.preventDefault();
                          document.getElementById('accept-friend')
                          .submit();">Accept Friend 
                        </button>
                        <button class="btn btn-danger"  onclick="event.preventDefault();
                          document.getElementById('delete-request')
                          .submit();">Remove 
                        </button>
                      </small>
                      </h4>
                      <form id="accept-friend" method="POST" action="{{route('friend.accept',$request->id)}}">
                                  {{csrf_field()}}
                      </form>
                      <form id="delete-request" method="POST" action="{{route('friend.remove',$request->id)}}">
                                  {{csrf_field()}}
                                  
                      </form>
                      <p>63 matual friends</p>
                    </a>
                  </li>
                  @endforeach
                  @else
                  <h5 style="padding: 10px">You do not have any requests...</h5> 
                  @endif
                  <!-- end message -->
                  
                </ul>
              </li>
             <!-- 
              <li class="footer"><a href="#">bbbbbbbbbbbbbb</a></li>
             -->
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p style="color: black">
                  Mahnoud Ali - Web Developer
                  <small>Member since Nov. 2014</small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer" >
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">

                  <a  class="btn btn-default btn-flat" 
                      href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                   Sign out
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js')}}"></script>

    <script>
      $(document).ready(function(){
        $('#exampleModalLong').on('shown.bs.modal', function (event) {

          var button = $(event.relatedTarget) 
          var title = button.data('title')
          var content = button.data('content') 
          var id = button.data('id')           
          var modal = $(this)
          modal.find('.modal-body #title').val(title)
          modal.find('.modal-body #content').val(content)
          modal.find('.modal-body #post_id').val(id)
        });
        $('#deleteModal').on('shown.bs.modal', function (event) {

          var button = $(event.relatedTarget) 
          var id = button.data('id') 

          var modal = $(this)
          
          modal.find('.modal-body #post_id').val(id)
        });
      });
    </script>
    @yield('scripts')
</body>
</html>
