<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <p  >
                            <img src="{{ asset('assets/images/icon/lhp.png') }}" alt="Admin..."  style="height: 70px"/>
                        </p>
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
                                
                             <li >
                                <a  class="example_e" href="{{ route('home') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-tachometer-alt  fa-lg"></i>Dashboard</a>

                            <li>
                                <a class="example_a" href="{{ route('nilai.showmurid') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-file fa-lg ml-3"></i>Nilai </a>
                            </li>
    
                                    
                    </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                        <a class="logoo" href="index.html">
                                <img src="{{ asset('assets/images/icon/Ld.png') }}" alt="Admin" />
                            

                        <!-- <i class="fas fa-user-circle fa-3x " style="color:darkcyan">ADMIN</i> -->
                    <!-- <img src="images/icon/.jpg " style="size: 40" alt="LOGO" /> -->
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar bg-whte md-0  pr-1 pt-0 mt-4 ml-0">
                    <ul class="list-unstyled navbar__list">
                           
                                <li > <hr>
                                    <a class="example_a" href="{{ route('home') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-tachometer-alt  fa-lg ml-3"></i>Dashboard</a>

                                <li>
                                    <a class="example_a" href="{{ route('nilai.showmurid') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-file fa-lg ml-3"></i>Nilai </a>
                                </li>  
                                </li><hr>
                            </ul> 
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

         <!-- PAGE CONTAINER-->
        <div class="page-container">