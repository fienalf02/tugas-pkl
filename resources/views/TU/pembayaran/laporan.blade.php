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
    
    @include('include.headertu')

    <!-- HEADER DESKTOP-->
    <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="judul">Laporan Pembayaran</div>
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

                        <form class="form-header " action="{{ route('laporan.search') }}" method="GET" style="float: right">
                        {{ csrf_field() }}
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas" />
                            <button class="au-btn--submit" type="submit"  style="background-color: rgb(41, 73, 128) " >
                                <i class="zmdi zmdi-search" ></i>
                            </button>
                        </form>

                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <select class="js-select2" name="type" onChange="document.location.href=this.options[this.selectedIndex].value;">
                                        <option selected="" disabled>Export</option>
                                        <option value="/laporan/export/{{ $search == '' ? '0': $search }}">Excel</option>
                                        <option value="/laporan/pdftu/{{ $search == null ? '0': $search }}">PDF</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                             </div>

                                    <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="bulan" id="id">
                                                <option selected="selected" disabled>Filter Bulan</option>
                                                @foreach($pembayarann as $p)
                                                <option value="{{ $p->id}}" {{$p->id == $search ? 'selected':'' }}>{{ $p->bulan}}</option>
                                                @endforeach
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data3">
                            @if(count($pembayaran)>0)
                                <thead style="background-color: #5c8f96">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Bulan</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>                 
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($pembayaran as $p)
                                    <tr class="tr-shadow">
                                        <td>{{$i}}</td>
                                        <td>{{$p->nama}}</td>
                                        <td>{{$p->kelas}} {{$p->jurusan}} {{$p->urutan}}</td>
                                        <td>{{$p->bulan}}</td>
                                        <td>{{$p->jumlah}}</td>
                                        <td class="text-center">{{$p->keterangan}}</td>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            @endif
                            </table>
                            {{ $pembayaran->links() }}
                        </div>
                        <!-- END DATA TABLE -->
                    </div>
                </div>
                @include('include.footer')

</div>
    @include('include.script')

    <script>
    document.getElementById("id").onchange = function() {myFunction()};

    function myFunction() {
        var x = document.getElementById("id").value;
        document.location.href='laporantu?search='+x;        
    }
    </script>

</body>

</html>
<!-- end document-->