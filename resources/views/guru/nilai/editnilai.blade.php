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
    
    @include('include.headerguru')

    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="judul">Data Nilai</div>
                            <div class="btnn">
                        @include('include.sosmed')
                        @include('include.forloginguru')
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
                                     <h3 class="title-5 m-b-35">Form Edit</h3>
                                     @foreach($nilai as $n)
                                     <form action="{{ route('nilai.update.guru', $n->id) }}" method="POST">
                                     {{ csrf_field() }}
                                     <div class="card-body card-block">
                                     <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="select" class=" form-control-label">Nama Siswa</label>
                                                </div>
                                                <div class="col-3">
                                                    <select name="id_siswakelas" id="select" class="form-control">
                                                        <option value="">-Pilihan-</option>
                                                        @foreach($siswakelas as $s)
                                                        <option value="{{ $s->id }}" {{$s->id == $n->id_siswakelas ? 'selected':'' }}>{{ $s->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="select" class=" form-control-label">Mata Pelajaran</label>
                                                </div>
                                                <div class="col-3">
                                                    <select name="id_jadwal" id="select" class="form-control">
                                                    <option value="">-Pilihan-</option>
                                                        @foreach($jadwal as $j)
                                                        <option value="{{ $j->id }}" {{ $j->id == $n->id_jadwal ? 'selected':'' }}>{{ $j->mapel }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="NIP" class=" form-control-label">Semester</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" id="semester" value="{{ $n->semester }}" class="form-control" name="semester">
                                        </div>
                                    </div>
                                    @foreach($Dnilai as $dn)
                                            <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="NIP" class=" form-control-label">Nilai Harian</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" id="tugas" value="{{ $dn->tugas }}" class="form-control" name="tugas">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="NIP" class=" form-control-label">Nilai UTS</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" id="uts" value="{{ $dn->uts }}" class="form-control" name="uts">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="NIP" class=" form-control-label">Nilai UAS</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" id="uas" value="{{ $dn->uas }}" class="form-control" name="uas">
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="NIP" class=" form-control-label">Nilai Rapot</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" id="rapot" value="{{ $n->rapot }}" class="form-control" name="rapot">
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