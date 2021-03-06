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
                            <div class="judul">Data Jadwal</div>
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
                                <form action="{{ route('jadwal.store') }}" method="POST">
                                     {{ csrf_field() }}
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="select" class=" form-control-label">Hari</label>
                                                </div>
                                                <div class="col-3">
                                                    <select name="hari" id="select" class="form-control">
                                                        <option value="">-Pilihan-</option>
                                                        <option value="Senin">Senin</option>
                                                        <option value="Selasa">Selasa</option>
                                                        <option value="Rabu">Rabu</option>
                                                        <option value="Kamis">Kamis</option>
                                                        <option value="Jum'at">Jum'at</option>
                                                    </select>
                                                </div>
                                            </div>
                                    <div class="row form-group">
                                                <div class="col col-md-4">
                                            <label for="company" class=" form-control-label">Waktu</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input name="jam" type="text" id="company" placeholder="Masukkan Waktu" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-4">
                                            <label for="company" class=" form-control-label">Ruangan</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input name="ruangan" type="number" id="company" placeholder="Masukkan Ruangan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-4">
                                            <label for="company" class=" form-control-label">Tahun Ajaran</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input name="tahun_ajaran" type="text" id="company" placeholder="Masukkan Tahun ajaran" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="select" class=" form-control-label">Guru</label>
                                                </div>
                                                <div class="col-5">
                                                    <select name="id_guru" id="select" class="form-control">
                                                        <option value="0">-Pilihan-</option>
                                                        @foreach($guru as $g)
                                                        <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="select" class=" form-control-label">Mata Pelajaran</label>
                                                </div>
                                                <div class="col-5">
                                                    <select name="id_mapel" id="select" class="form-control">
                                                        <option value="0">-Pilihan-</option>
                                                        @foreach($mapel as $m)
                                                        <option value="{{ $m->id }}">{{ $m->mapel }}</option>
                                                        @endforeach
                                                    </select>
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