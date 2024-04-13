<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                      
                        <img src="{{asset('common/male_avator.jpg')}}" alt="Profile Image"  style="width: 70px; height: 50px;">

                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                    <li>
                            <a href="{{url('user/dashboard')}}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Profile Manage
                                <i class="fas fa-caret-down"></i>
                            </a>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('profile.view')}}">View Profile</a>
                                </li>
                                <li>
                                    <a href="register.html">Update Profile</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="form.html">
                            <i class="fas fa-sync-alt"></i>Renewal Section</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                            <i class="fas fa-history"></i>Scan History</a>
                        </li>
                        
                       
                    </ul>
                </div>
            </nav>
        </header>