<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    @include('include.link')
</head>

<body class="animsition">
    <div class="page-wrapper">
    
    @include('include.header')
    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <div class="judul">Dashboard</div>
                        <div class="btnn">
                        @include('include.sosmed')
                        @include('include.forlogin')
                    </div>
                </div>
            </div>
    </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                <!-- WELCOME -->
                <section class="welcome p-t-10">
                    <div class="container-fluid">
                        <div class="row">
                            <h1 class="title-4">Welcome
                                <span>{{ Auth::user()->name }} !</span>
                            </h1>
                            <hr class="line-seprate">
                        <div class="col-md-12">
                    <div class="overview-wrap">
                </section>
                <!-- END WELCOME -->
                    <!-- STATISTIC-->
                    <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                            </div>
                                            <div class="text">
                                            <h2>{{ $countGuru->count() }}</h2>
                                                <span> Guru</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="text">
                                            <h2>{{ $countSiswa->count() }}</h2>
                                                <span> Siswa</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-table"></i>
                                            </div>
                                            <div class="text">
                                            <h2>{{ $countKelas->count() }}</h2>
                                                <span> Kelas</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fas fa-archive"></i>
                                            </div>
                                            <div class="text">
                                            <h2>{{ $countJurusan->count() }}</h2>
                                                <span> Jurusan</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                    <!-- END STATISTIC-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
    </div>
</div>
    @include('include.script')
</body>

</html>
<!-- end document-->
