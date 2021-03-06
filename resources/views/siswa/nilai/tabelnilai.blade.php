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
                            <div class="judul">Data Nilai</div>
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        
                        <!-- DATA TABLE -->
                            <h3 class="title-5 m-b-35">NIS : {{ $detail_siswa->NIS}}</h3>  
                            <h3 class="title-5 m-b-35">nama siswa : {{ $detail_siswa->nama}}</h3>
                            <h3 class="title-5 m-b-35">kelas : {{ $detail_siswa->jurusan}} {{ $detail_siswa->urutan}}</h3>
                            <h3 class="title-5 m-b-35">Wali kelas : {{ $detail_siswa->nama_guru}}</h3>
                            
                        <form class="form-header " action="{{ route('nilai.searchmurid') }}" method="GET" style="float: right">
                        {{ csrf_field() }}
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas" />
                            <button class="au-btn--submit" type="submit"  style="background-color: rgb(41, 73, 128) " >
                                <i class="zmdi zmdi-search" ></i>
                            </button>
                        </form>
                        </div>
                        </div>

                        <div class="table-data__tool">
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data3">
                            @if(count($nilai)>0)
                                <thead style="background-color: #5c8f96">
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Semester</th>
                                        <th>Nilai Tugas</th>
                                        <th>Nilai UTS</th>
                                        <th>Nilai UAS</th>
                                        <th>Nilai Rapot</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($nilai as $n)
                                    <tr class="tr-shadow">
                                        <td>{{$i}}</td>
                                        <td>{{$n->mapel}}</td>
                                        <td>{{$n->semester}}</td>
                                        <td>{{$n->tugas}}</td>
                                        <td>{{$n->uts}}</td>
                                        <td>{{$n->uas}}</td>
                                        <td>{{$n->rapot}}</td>
                                        <td>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                            {{ $nilai->links() }}
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