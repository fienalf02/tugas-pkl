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
        
        @include('include.headermurid')

        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="judul">Dashboard</div>
                            <div class="btnn">
                        @include('include.sosmed')
                        @include('include.forloginsiswa')
                    </div>
                </div>
            </div>
    </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <h1 class="title-4">Welcome
                                <span>{{ Auth::user()->name }} !</span>
                            </h1>
                            <hr class="line-seprate">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    
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
