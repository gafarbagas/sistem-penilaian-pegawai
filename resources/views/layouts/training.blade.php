<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel = "icon" type = "image/png" href = "/admin/img/ww.png">
    <!-- Custom styles for this template-->
    <link href="{{asset('/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- iziToast -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/dist/css/iziToast.css')}}">
    <!-- Custom styles for this template-->
    <link href="{{asset('/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/admin/css/materialize.min.css')}}"> --}}

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('includes.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('includes.navbar')
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('includes.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Materialize-->
    <script src="{{asset ('/admin/js/materialize.min.js')}}"></script>
    {{-- <script src="{{asset ('/admin/js/sb-admin-2.min.js')}}"></script> --}}
    {{-- <script src="{{asset ('/admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset ('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
    <script type="text/javascript">
        $(document).ready(function(){
          $.ajax({
              type: 'get',
              url: '/training/icp/ajax',
              success:function(response){
                  console.log(response);
                  var custArray = response;
                  var dataCust = {};
                  var dataCust2 = {};
                  for (var i=0; i < custArray.length; i++){
                      dataCust[custArray[i].employee_id]= null;
                      dataCust2[custArray[i].employee_id]= custArray[i];
                  }
                  console.log('employee_id2');
                  console.log(dataCust2);
                  $('.autocomplete').autocomplete({
                      data: dataCust,
                      limit: 5,
                      minLength: 2,
                      onAutocomplete:function(reqdata){
                          console.log(reqdata);
                         $('#nama_employee').val(dataCust2[reqdata]['nama_employee']);
                         $('#id_employee').val(dataCust2[reqdata]['id_employee']);
                      }
                  });
              }
          })
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="produk"]').on('change', function() {
                var produk = $(this).val();
                if(produk) {
                    $.ajax({
                        url: '/training/ajax/'+produk,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            if(data.success == false){
                                $('select[name="jenis_ajar"]').empty();
                                $('select[name="jenis_ajar"]').append('<option value="">-</option>');
                            }else{
                                $('select[name="jenis_ajar"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="jenis_ajar"]').append('<option value="'+ value +'">'+ value +'</option>');
                                });
                            }
                        }
                    });
                }else{
                    $('select[name="jenis_ajar"]').empty();
                }
            });
        });
    </script>
    
    

    <!-- Custom scripts for all pages-->
    {{-- <script src="{{asset ('/admin/js/sb-admin-2.min.js')}}"></script> --}}

    <!-- SweetAlert IziToast-->
    <script src="{{ asset('/admin/dist/js/iziToast.js')}}">
    </script>


    @if (session('success'))
    <script>
        iziToast.success({
            title: 'INFO!!!',
            message: "{{ session('success') }}"
        });
    </script>
    @endif

    @if (session('delete'))
    <script>
        iziToast.warning({
            title: 'INFO!!!',
            message: "{{ session('delete') }}"
        });
    </script>
    @endif

</body>

</html>