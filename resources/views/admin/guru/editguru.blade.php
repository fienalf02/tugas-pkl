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
                                <div class="col-md-12">
                                     <!-- DATA TABLE -->
                                     <h3 class="title-5 m-b-35">Form Edit</h3>
                                     @foreach($guru as $g)
                                    <form action="{{ route('guru.update', $g->id ) }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-4">
                                            <label for="NIP" class=" form-control-label">NIP</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="number" id="NIP" value="{{ $g->NIP }}" class="form-control" name="NIP">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col col-md-4">
                                            <label for="nama" class=" form-control-label">Nama</label>
                                        </div>
                                        <div class="col col-md-8">
                                            <input type="text" id="nama" value="{{ $g->nama_guru }}" class="form-control" name="nama_guru">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col col-md-4 ">
                                            <label class=" form-control-label">Jenis Kelamin</label>
                                            </div>
                                                <div class="col-md-8">
                                                    <div class="form-check-inline form-check">
                                                        <label for="P" class="form-check-label ">
                                                            <input type="radio" id="P" value="Perempuan" class="form-check-input" name="JK" {{ $g->JK == 'Perempuan' ? 'checked' : ''}}>Perempuan
                                                        </label> &nbsp &nbsp
                                                        <label for="L" class="form-check-label ">
                                                            <input type="radio" id="L" value="Laki-laki" class="form-check-input" name="JK" {{ $g->JK == 'Laki-laki' ? 'checked' : ''}}>Laki-laki
                                                        </label>
                                                    </div>
                                                </div></div>
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