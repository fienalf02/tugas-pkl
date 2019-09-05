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
                            <div class="judul">Data Guru</div>
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

                        <form class="form-header " action="{{ route('guru.search') }}" method="GET" style="float: right">
                        {{ csrf_field() }}
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas" />
                            <button class="au-btn--submit" type="submit"  style="background-color: rgb(41, 73, 128) " >
                                <i class="zmdi zmdi-search" ></i>
                            </button>
                        </form>

                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                            <a href="{{ route('guru.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add item</a>
                                    
                                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <select class="js-select2" name="type" onChange="document.location.href=this.options[this.selectedIndex].value;">
                                        <option selected="selected" disabled>Export</option>
                                        <option value="/guru/export">Excel</option>
                                        <option value="/guru/pdf">PDF</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                             
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data3">
                            @if(count($guru)>0)
                                <thead style="background-color: #5c8f96">
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Guru</th>
                                        <th>Jenis Kelamin</th>                           
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($guru as $g)
                                    <tr class="tr-shadow">
                                        <td>{{$i}}</td>
                                        <td>{{$g->NIP}}</td>
                                        <td>{{$g->nama_guru}}</td>
                                        <td>{{$g->JK}}</td>
                                        <td>
                                        <div class="table-data-feature">
                                                <a href="{{ route('guru.edit', $g->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="{{ route('guru.destroy', $g->id) }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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
                            {{ $guru->links() }}
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