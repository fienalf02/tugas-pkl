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
                            <div class="judul">Tabel Kelas</div>
                            <div class="btnn">
                            @include('include.sosmed')
                        </form>
                        
                           <!-- <div > 
                               

                           <button> <p style="color: rgb(107, 107, 233)"> <i class="fab fa-twitter-square fa-3x"></i></p></button>
                          </div> -->
                            
                

                          <div class="account-wrap">
                               @if (Auth::guest())
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @else
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <i class="fas fa-user fa-lg fa-2.5x"></i>  <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <i class="fas fa-user-circle fa-4x"></i>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">{{ Auth::user()->name }}</a>
                                                    </h5>
                                                    <span class="email">{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <div class="account-dropdown__item">
                                                    <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                        </div></div></div>
            </header>
            <!-- HEADER DESKTOP-->
             
  <!-- MAIN CONTENT-->
  <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        
                        <!-- DATA TABLE -->
                        <h3 class="title-5 m-b-35">data table</h3>

                        <form class="form-header " action="{{ route('kelas.search') }}" method="GET" style="float: right">
                        {{ csrf_field() }}
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                            <button class="au-btn--submit" type="submit"  style="background-color: rgb(41, 73, 128) " >
                                <i class="zmdi zmdi-search" ></i>
                            </button>
                        </form>

                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <a href="{{ route('kelas.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add item</a>
                                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <select class="js-select2" name="type" onChange="document.location.href=this.options[this.selectedIndex].value;">
                                        <option selected="selected">Export</option>
                                        <option value="/kelas/export">Excel</option>
                                        <option value="/kelas/pdf">PDF</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                             
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data3">
                            @if(count($kelas)>0)
                                <thead style="background-color: #5c8f96">
                                    <tr>
                                        <th>No</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Urutan</th>                               
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($kelas as $k)
                                    <tr class="tr-shadow">
                                        <td>{{$i}}</td>
                                        <td>{{$k->kelas}}</td>
                                        <td>{{$k->jurusan}}</td>
                                        <td>{{$k->urutan}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <a href="{{ route('kelas.edit', $k->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('kelas.destroy', $k->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
                @include('include.footer')

</div>
    @include('include.script')

</body>

</html>
<!-- end document-->