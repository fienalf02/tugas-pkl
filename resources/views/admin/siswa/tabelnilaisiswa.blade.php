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
                            <div class="judul">Data Siswa</div>
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        
                        <!-- DATA TABLE -->

                        <form class="form-header " action="{{ route('siswa.searchnilai') }}" method="GET" style="float: right">
                        {{ csrf_field() }}
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas" />
                            <button class="au-btn--submit" type="submit"  style="background-color: rgb(41, 73, 128) " >
                                <i class="zmdi zmdi-search" ></i>
                            </button>
                        </form>

                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="rs-select2--light rs-select2--md">
                                    <select class="js-select2" name="kelas" id="id_kelas" >
                                        <option selected="selected">Filter Kelas</option>
                                            @foreach($kelas as $k)
                                                 <option value="{{ $k->id}}" {{$k->id == $search ? 'selected':'' }}>{{ $k->kelas}} {{ $k->jurusan}} {{ $k->urutan}}</option>
                                            @endforeach
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data3">
                            @if(count($siswa)>0)
                                <thead style="background-color: #5c8f96">
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>JK</th>
                                        <th>Kelas</th>       
                                        <th>Wali Kelas</th>                
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($siswa as $s)
                                    <tr class="tr-shadow">
                                        <td>{{$i}}</td>
                                        <td>{{$s->NIS}}</td>
                                        <td>{{$s->nama}}</td>
                                        <td>{{$s->JK}}</td>
                                        <td>{{$s->kelas}} {{$s->jurusan}} {{$s->urutan}}</td>
                                        <td>{{$s->nama_guru}}</td>
                                        <td>
                                        <div class="table-data-feature">
                                                <a href="{{ route('nilai.show', $s->id_siswa) }}" class="item" data-toggle="tooltip" data-placement="top" title="Nilai">
                                                    <i class="zmdi zmdi-info"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>
                                @endif
                            </table>
                            {{ $siswa->links() }}
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
                @include('include.footer')
</div>
    @include('include.script')
    <script>
    document.getElementById("id_kelas").onchange = function() {myFunction()};

    function myFunction() {
        var x = document.getElementById("id_kelas").value;
        document.location.href='tabelnilaisiswa?search='+x;        
    }
    </script>

</body>

</html>
<!-- end document-->