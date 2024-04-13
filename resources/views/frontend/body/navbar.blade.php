<style>
  /* Add a media query for tablets and smaller screens */
  @media only screen and (max-width: 768px) {
    .wrapper.col2 #header .fl_left,
    .wrapper.col2 #header #topnav {
      width: 100%;
      text-align: center;
    }

    .wrapper.col2 #header .fl_left h1 {
      margin: 0;
    }

    .wrapper.col2 #header #topnav {
      margin-top: 20px;
    }

    .wrapper.col2 #header #topnav ul {
      display: block;
      width: 100%;
      padding: 0;
    }

    .wrapper.col2 #header #topnav ul li {
      width: 100%;
      text-align: center;
      margin: 0;
      padding: 0;
      border-bottom: 1px solid #444;
    }

    .wrapper.col2 #header #topnav ul li:last-child {
      border-bottom: none;
    }

    .wrapper.col2 #header #topnav ul li a {
      display: block;
      width: 100%;
      padding: 10px;
      text-align: center;
    }

    .wrapper.col2 #header #topnav ul ul {
      display: none;
    }
  }

  /* Add a media query for smaller screens, like mobile phones */
  @media only screen and (max-width: 480px) {
    .wrapper.col2 #header #topnav {
      position: relative;
    }

    .wrapper.col2 #header #topnav ul li {
      display: block;
      width: 100%;
    }

    .wrapper.col2 #header #topnav ul li a {
      padding: 15px;
    }

    .wrapper.col2 #header #topnav ul ul {
      position: static;
      display: none;
    }
  }
</style>
<div class="wrapper col2">
  <div id="header" class="clear">
    <div class="fl_left">
      <!-- <h1><a href="index.html">BuildBase</a></h1> -->
      
      <img src="{{asset('common/logo.png')}}" width="100" height="70" alt="">
      <!-- <p>Usama FYP</p> -->
    </div>
    <div id="topnav">
      <ul>
        <!-- <li class="last"><a href="{{route('login')}}" style="background-color: red; padding:10px;">Login</a><span></span></li> -->
        
        @if(Route::has('login'))
    @auth('web')
        <!-- Display Seeker options if 'web' guard is authenticated -->
        <li class="" style="background-color: #202020;">
            <a href="#" style="padding:10px; background-color:red; color:white;">{{ Auth::user()->email }}</a>
            <ul style="background-color: #202020;">
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('user.logout') }}">Log Out</a></li>
            </ul>
        </li>
    @endauth



    @guest
        <!-- Display Seeker and Provider options for guests -->
        <li class="" style="background-color: #202020;">
            <a href="#" style="padding:10px; background-color:red; color:white;">Customer</a>
            <ul style="background-color: #202020;">
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
        </li>

        <li class="" style="background-color: #202020;">
            <a href="#" style="padding:10px; background-color:red; color:white;">Technician</a>
            <ul style="background-color: #202020;">
                <li><a href="{{ url('admin/register') }}">Register</a></li>
                <li><a href="{{ url('admin/login') }}">Login</a></li>
            </ul>
        </li>
    @endguest
@endif





        <li class=""><a href="{{route('user.gallery.view')}}" style="padding:10px">Gallery</a></li>
        <!-- <li><a href="{{route('shops.view')}}" style="padding:10px">Shops</a></li> -->
        <!-- <li><a href="#" style="padding:10px;">DropDown</a>
          <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
          </ul>
        </li> -->
        <li><a href="{{route('services.view')}}" style="padding:10px">Services</a></li>
        <li><a href="{{route('about.us')}}" style="padding:10px">About Us</a></li>
        <li class="active"><a href="{{url('/')}}" style="padding:10px">Homepage</a></li>
      </ul>
    </div>
  </div>
</div>
