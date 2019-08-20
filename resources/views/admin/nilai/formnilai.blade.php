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
                            <div class="judul">Tabel Nilai</div>
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
                                <div class="col-md-12">
                                     <!-- DATA TABLE -->
                                     <h3 class="title-5 m-b-35">Form Tambah</h3>
                                    <form action="{{ route('nilai.store') }}" method="POST">
                                        {{ csrf_field() }}
                                    <div class="card-body card-block">
                                    <input type="hidden" name="id_siswakelas" value="{{ $id }}">
                                    <!-- <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="select" class=" form-control-label">Nama Siswa</label>
                                                </div>
                                                <div class="col-3">
                                                    <select name="id_siswakelas" id="select" class="form-control">
                                                        <option value="">-Pilihan-</option>
                                                        @foreach($siswakelas as $s)
                                                        <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="select" class=" form-control-label">Mata Pelajaran</label>
                                                </div>
                                                <div class="col-3">
                                                    <select name="id_jadwal" id="select" class="form-control">
                                                        <option value="0">-Pilihan-</option>
                                                        @foreach($jadwal as $m)
                                                        <option value="{{ $m->id }}">{{ $m->mapel }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="NIP" class=" form-control-label">Semester</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" id="company" placeholder="Masukkan Semester" class="form-control" name="semester">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="Rapot" class=" form-control-label">Nilai Tugas</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" id="company" placeholder="Masukkan Nilai Tugas" class="form-control" name="tugas">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="Rapot" class=" form-control-label">Nilai UTS</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" id="company" placeholder="Masukkan Nilai Rapot" class="form-control" name="uts">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="Rapot" class=" form-control-label">Nilai UAS</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" id="company" placeholder="Masukkan Nilai Rapot" class="form-control" name="uas">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="Rapot" class=" form-control-label">Nilai Rapot</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" id="company" placeholder="Masukkan Nilai Rapot" class="form-control" name="rapot">
                                        </div>
                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-sm ml-100 " style="background-color: rgb(41, 73, 128) ">
                                                        <i class="fa fa-dot-circle-o"></i> Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-danger btn-sm" style="background-color: rgb(146, 24, 24) ">
                                                        <i class="fa fa-ban"></i> Reset
                                                    </button>
                                        </div>
                                    </div>
                                         <!-- <div class="row form-group">
                                             <div class="col-8">
                                                 <div class="form-group">
                                                     <label for="city" class=" form-control-label">City</label>
                                                     <input type="text" id="city" placeholder="Enter your city" class="form-control">
                                                 </div>
                                             </div>
                                             <div class="col-8">
                                                 <div class="form-group">
                                                     <label for="postal-code" class=" form-control-label">Postal Code</label>
                                                     <input type="text" id="postal-code" placeholder="Postal Code" class="form-control">
                                                 </div>
                                             </div>
                                         </div> -->
                                     </div>
                                 </div>
                             </div>
                             </form>
                             <div class="col-lg-6">
                                 <div class="card">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-12">
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
    
     </div>
    @include('include.script')

</body>

</html>
<!-- end document-->