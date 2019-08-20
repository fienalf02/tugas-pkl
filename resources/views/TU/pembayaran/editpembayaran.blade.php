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
                            <div class="judul">Tabel pembayaran</div>
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
                                     <h3 class="title-5 m-b-35">Form Edit</h3>
                                     @foreach($pembayaran as $p)
                                     <form action="{{ route('pembayaran.update', $p->id) }}" method="POST">
                                     {{ csrf_field() }}
                                     <div class="card-body card-block">
                                     <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="select" class=" form-control-label">Nama Siswa</label>
                                                </div>
                                                <div class="col-3">
                                                    <select name="id_siswakelas" id="select" class="form-control">
                                                        <option value="">-Pilihan-</option>
                                                        @foreach($pembayaran as $s)
                                                        <option value="{{ $s->id }}" {{$s->id == $p->id_siswakelas ? 'selected':'' }}>{{ $s->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div><div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="month" class=" form-control-label">Bulan</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="moth" id="datepicker" value="{{$p->bulan}}" class="form-control datepicker" name="bulan">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="date" class=" form-control-label">Jatuh Tempo</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="date" id="date" class="form-control datepicker"  value="{{$p->jatuh_tempo}}" name="jatuh_tempo"  >
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="date" class=" form-control-label">Tanggal Bayar</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="date" id="date2" class="form-control datepicker"  value="{{$p->tgl_bayar}}" name="tgl_bayar"  >
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="" class=" form-control-label">Nomor Bayar</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="text" id="company" value="{{ $p->nomor }}" class="form-control datepicker" name="nomor">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="Rapot" class=" form-control-label">Jumah</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" id="company" value="{{ $p->jumlah }}" class="form-control" name="jumlah">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="Rapot" class=" form-control-label">Keterangan</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="text" id="company" value="{{ $p->keterangan }}" class="form-control" name="keterangan">
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
                             @endforeach
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