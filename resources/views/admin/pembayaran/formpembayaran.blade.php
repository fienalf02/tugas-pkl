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
                            <div class="judul">Data Pembayaran</div>
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
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                     <!-- DATA TABLE -->
                                     <h3 class="title-5 m-b-35">Form Tambah</h3>
                                    <form action="{{ route('pembayaran.store') }}" method="POST">
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
                                                        @foreach($pembayaran as $s)
                                                        <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="month" class=" form-control-label">Bulan</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="text" id="date3" placeholder="Masukkan Bulan" class="form-control datepicker" name="bulan" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="date" class=" form-control-label">Jatuh Tempo</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="text" id="date" class="form-control datepicker"  placeholder="Masukkan Tanggal" name="jatuh_tempo" autocomplete="off" >
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="Rapot" class=" form-control-label">Jumlah</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" min="0" id="company" placeholder="Masukkan Jumlah" class="form-control" name="jumlah">
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