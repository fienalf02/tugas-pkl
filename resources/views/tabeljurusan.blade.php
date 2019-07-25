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
    <title>Dashboard</title>

    @include('include.link')

</head>

<body class="animsition">
    <div class="page-wrapper">
    
    @include('include.header')
             
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

                        <form class="form-header " action="" method="POST" style="float: right">
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                            <button class="au-btn--submit" type="submit"  style="background-color: rgb(41, 73, 128) " >
                                <i class="zmdi zmdi-search" ></i>
                            </button>
                        </form>

                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add item</button>
                                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <select class="js-select2" name="type">
                                        <option selected="selected">Export</option>
                                        <option value="">Excel</option>
                                        <option value="">PDF</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                             
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data3">
                            @if(count($jurusans)>0)
                                <thead style="background-color: #5c8f96">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jurusan</th>                               
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                @foreach($jurusans as $j)
                                    <tr class="tr-shadow">
                                        <td>{{$i}}</td>
                                        <td>{{$j->jurusan}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright &copy; 2019 SMKN1CIREBON. All rights reserved. Amanah-Proffesional-Berprestasi.</p>
                        </div>
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