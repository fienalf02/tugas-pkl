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
                                <a class="example_e" href="{{ route('jurusan.index') }}" target="self" rel="nofollow noopener">
                                <i class="fa fa-archive fa-lg"></i>Jurusan</a>
                            </li>
                            <li>
                                <a class="example_e" href="{{ route('kelas.index') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-table fa-lg"></i>Kelas</a>
                            </li>
                            <li>
                                <a class="example_e" href="{{ route('guru.index') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-chalkboard-teacher fa-lg "></i>Guru </a>
                            </li>

                            <li>
                                <a class="example_e" href="{{ route('siswa.index') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-user fa-lg"></i>Siswa </a>
                            </li>

                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                        
                            </ul>
                            </li>
                            <li>
                                <a class="example_e" href="{{ route('siswa.nilai') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-file fa-lg"></i>Nilai </a>
                            </li>
    
                            <li>
                                <a class="example_e" href="{{ route('mapel.index') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-book fa-lg"></i>Mata Pelajaran</a>
                            </li>
    
                            <li>
                                <a class="example_e" href="{{ route('jadwal.index') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-calendar-alt fa-lg"></i>Jadwal</a>
                            </li>

                            <li>
                                <a class="example_e" href="{{ route('siswa.spp') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-credit-card fa-lg"></i>Pembayaran SPP</a>
                            </li>

                            <li>
                                <a class="example_a" href="{{ route('laporan.show') }}" target="self" rel="nofollow noopener">
                                <i class="fas fa-file-alt fa-lg ml-3"></i>Laporan SPP</a>
                            </li>  
                            </li><hr>
                                    
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
                            

                        <!-- <i class="fas fa-chalkboard-teacher fa-3x " style="color:darkcyan">ADMIN</i> -->
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
                                    <a class="example_a" href="{{ route('jurusan.index') }}" target="self" rel="nofollow noopener">
                                    <i class="fa fa-archive fa-lg ml-3"></i>Jurusan</a>
                                </li>
                                <li>
                                    <a class="example_a" href="{{ route('kelas.index') }}" target="self" rel="nofollow noopener" href="kelas.php">
                                    <i class="fas fa-table fa-lg ml-3"></i>Kelas</a>
                                </li>
                                <li>
                                    <a class="example_a" href="{{ route('guru.index') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-chalkboard-teacher fa-lg ml-3"></i>Guru </a>
                                </li>
                               
                                <li>
                                    <a class="example_a" href="{{ route('siswa.index') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-user fa-lg ml-3"></i>Siswa </a>
                                 </li>
        
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                               
                                </ul></li>
                                <li>
                                    <a class="example_a" href="{{ route('siswa.nilai') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-file fa-lg ml-3"></i>Nilai </a>
                                </li>

                                <li>
                                    <a class="example_a" href="{{ route('mapel.index') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-book fa-lg ml-3"></i>Mata Pelajaran</a>
                                </li>

                                <li>
                                    <a class="example_a" href="{{ route('jadwal.index') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-calendar-alt fa-lg ml-3"></i>Jadwal</a>
                                </li>  
                                
                                <li>
                                    <a class="example_a" href="{{ route('siswa.spp') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-credit-card fa-lg ml-3"></i>Pembayaran SPP</a>
                                </li>  
                                </li>

                                <li>
                                    <a class="example_a" href="{{ route('laporan.show') }}" target="self" rel="nofollow noopener">
                                    <i class="fas fa-file-alt fa-lg ml-3"></i>Laporan SPP</a>
                                </li>  
                                </li>
                                <hr>
                            </ul> 
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

         <!-- PAGE CONTAINER-->
        <div class="page-container">