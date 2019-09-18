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
                            <div class="judul">Profile User</div>
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
                                <div class="col-md-12">
                                     <!-- DATA TABLE -->
                                     <h3 class="title-5 m-b-35">Form Edit</h3>
                                     @foreach($user as $u)
                                     <form action="{{ route('user.update') }}" method="POST">
                                     {{ csrf_field() }}
                                     <div class="card-body card-block">
                                         <div class="row form-group">
                                                 <div class="col col-md-4">
                                             <label for="company" class=" form-control-label">Nama</label>
                                         </div>
                                         <div class="col-12 col-md-8">
                                             <input type="text" id="company" name="name" class="form-control" value="{{$u->name}}">
                                         </div> 
                                     </div>
                                     <div class="row form-group">
                                                 <div class="col col-md-4">
                                             <label for="company" class=" form-control-label">NIS</label>
                                         </div>
                                         <div class="col-12 col-md-8">
                                             <input type="text" id="company" name="username" class="form-control" value="{{$u->username}}">
                                         </div> 
                                     </div>
                                     <div class="row form-group">
                                                 <div class="col col-md-4">
                                             <label for="password" class=" form-control-label">Password</label>
                                         </div>
                                         <div class="col-12 col-md-8">
                                             <input type="password" id="password" name="password" class="form-control" autocomplete="off">
                                         </div> 
                                     </div>

                                     <div class="row form-group">
                                                 <div class="col col-md-4">
                                             <label for="password-confirm" class=" form-control-label">Confirm Password</label>
                                         </div>
                                         <div class="col-12 col-md-8">
                                             <input type="password" id="password-confirm" name="password_confirmation" class="form-control" autocomplete="off">
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