<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo " >
                <a href="#" class="">
                    <center>
                    <img src="{{asset('common/logo.png')}}" width="70" height="20" alt="Cool Admin" />

                    </center>
                    <h5>Technician Dashboard</h5>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <!-- <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="{{url('admin/dashboard')}}">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>

                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Profile Manage
                                <i class="fas fa-caret-down"></i>
                            </a>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('profile.view')}}">View Profile</a>
                                </li>
                                <li>
                                    <a href="{{route('profile.edit')}}">Update Profile</a>
                                </li>
                            </ul>
                        </li> -->


                        <li>
                            <a href="{{route('add.province')}}">
                            <i class="fas fa-sync-alt"></i>Add Provinces</a>
                        </li>

                        <li>
                            <a href="{{route('add.city')}}">
                            <i class="fas fa-sync-alt"></i>Add Cities</a>
                        </li>
                        <li>
                            <a href="{{route('add.category')}}">
                            <i class="fas fa-folder-open "></i>Add Category</a>
                        </li>


                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Gallery
                                <i class="fas fa-caret-down"></i>
                            </a>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('add.gallery')}}">Gallery</a>
                                </li>
                                <li>
                                    <a href="{{route('manage.gallery')}}">Manage Gallery</a>
                                </li>
                            </ul>
                        </li>
                        
                        
                   
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Services
                                <i class="fas fa-caret-down"></i>
                            </a>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('provider.add.services')}}">Add Services</a>
                                </li>
                                <li>
                                    <a href="{{route('provider.manage.services')}}">Manage Services</a>
                                </li>
                            </ul>
                        </li>

                        
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Shops
                                <i class="fas fa-caret-down"></i>
                            </a>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('provider.add.shops')}}">Add Shops</a>
                                </li>
                                <li>
                                    <a href="{{route('provider.manage.shops')}}">Manage Shops</a>
                                </li>
                            </ul>
                        </li> -->

                        <li>
                            <a href="{{route('seeker.contact.provider')}}">
                            <i class="fas fa-folder-open "></i>Contacted Seekers</a>
                        </li>
                        <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li> -->
                       
                    </ul>
                </nav>
            </div>
        </aside>