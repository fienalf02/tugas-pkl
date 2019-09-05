<!-- Jquery JS-->
  <script src="{{ asset('assets/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('assets/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('assets/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('jquery-ui/external/jquery/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    @include('sweetalert::alert')
    <script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">

    $('#date').datepicker({  

       format: 'dd-mm-yyyy',

     });  

    </script>

    <script type="text/javascript">

    $('#date2').datepicker({  

      format: 'dd-mm-yyyy',

    });  

    </script>

    <script type="text/javascript">

    $('#date3').datepicker({  

      format: 'MM yyyy',
                viewMode: "months",
                minViewMode: "months",
                autoClose: true

    });  

    </script>

    <script>
    $(function() {
        $( "#datepicker" ).datepicker({dateFormat: 'yy'});
    });​
    </script>