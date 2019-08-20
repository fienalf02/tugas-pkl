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
                                <a class="example_e" href="{{ route('jurusan.indexguru') }}" target="self" rel="nofollow noopener">
                                <i class="fa fa-archive fa-lg"></i>Jurusan</a>
                            </li>
                            <li>
                                <a class="example_e" href="{{ route('kelas.indexguru') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-table fa-lg"></i>Kelas</a>
                            </li>
                            <li>
                                <a class="example_e" href="{{ route('guru.indexguru') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-chalkboard-teacher fa-lg "></i>Guru </a>
                            </li>

                            <li>
                                <a class="example_e" href="{{ route('siswa.indexguru') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-user fa-lg"></i>Siswa </a>
                            </li>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                        
                            </ul>
                            </li>
                            <li>
                                <a class="example_e" href="{{ route('siswa.nilai.guru') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-file fa-lg"></i>Nilai </a>
                            </li>
    
                            <li>
                                <a class="example_e" href="{{ route('mapel.indexguru') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-book fa-lg"></i>Mata Pelajaran</a>
                            </li>
    
                            <li>
                                <a class="example_e" href="{{ route('jadwal.indexguru') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-calendar-alt fa-lg"></i>Jadwal</a>
                            </li>

                            <li>
                                <a class="example_e" href="{{ route('siswa.spp.guru') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-calendar-alt fa-lg"></i>Pembayaran pembayaran</a>
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
                        <a class="logoo" href="indexguru.html">
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
                            
                                <li><tr>
                                    <a class="example_a" href="{{ route('jurusan.indexguru') }}" target="self" rel="nofollow noopener">
                                    <i class="fa fa-archive fa-lg ml-3"></i>Jurusan</a>
                                </li>
                                <li>
                                    <a class="example_a" href="{{ route('kelas.indexguru') }}" target="self" rel="nofollow noopener" href="kelas.php">
                                    <i class="fas fa-table fa-lg ml-3"></i>Kelas</a>
                                </li>
                                <li>
                                    <a class="example_a" href="{{ route('guru.indexguru') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-user-circle fa-lg ml-3"></i>Guru </a>
                                </li>
                               
                                <li>
                                    <a class="example_a" href="{{ route('siswa.indexguru') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-user fa-lg ml-3"></i>Siswa </a>
                                 </li>
        
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                               
                                </ul></li>
                                <li>
                                    <a class="example_a" href="{{ route('siswa.nilai.guru') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-file fa-lg ml-3"></i>Nilai </a>
                                </li>

                                <li>
                                    <a class="example_a" href="{{ route('mapel.indexguru') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-book fa-lg ml-3"></i>Mata Pelajaran</a>
                                </li>

                                <li>
                                    <a class="example_a" href="{{ route('jadwal.indexguru') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-calendar-alt fa-lg ml-3"></i>Jadwal</a>
                                </li>  

                                <li>
                                    <a class="example_a" href="{{ route('siswa.spp.guru') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-calendar-alt fa-lg ml-3"></i>Pembayaran SPP</a>
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