@extends('layouts.admin')

@section('title','Tambah Member')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Tambah Member</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-black">
            <div class="card">
                <div class="card-body">
                    <form name="filter_form" method="POST" action="/grup/tambah">
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="form-group row">
                            <label for="name"  class="col-sm-2 col-form-label">PC Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nama_employee" id="name" placeholder="PC Name" value="{{ old('name') }}">
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-secondary btn-filter" type="button"><i class="fa fa-search"></i></button>
                            </div>
                        </div>

                        <div class="list-detail">
                                
                        </div>
                                
                    
                        <div class="text-center">
                            <button class="btn btn-primary save" type="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).on('click', '.btn-filter', function(){
        var name = $('input[name=nama_employee]').val();
        if(name == ''){
            Swal.fire("Terjadi Kesalahan", "Silahkan Isi Kolom PC Name", "error");
        }else{
            $('form[name=filter_form]').submit();
        }
    });

    $(document).on('submit', 'form[name=filter_form]', function(e){
    e.preventDefault();
    var request = new FormData(this);
    $.ajax({
        url: "{{ url('/grup/tambah/ambildata') }}",
        method: "POST",
        data: request,
        contentType: false,
        cache: false,
        processData: false,
        success:function(data){
            if(data.success==false){
                Swal.fire('Gagal','Data Employee Tidak Ditemukan','error')
                .then(function() {
                        // Redirect the user
                        window.location.href = "/grup/tambah";
                    });
            }else{
                $('.list-detail').html(data);
            }
        }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".save").click(function(e){

        e.preventDefault();

        var id_employee = $("input[name=id_employee]").val();
        var url = "{{ url('/grup/tambah')}}";

        // var sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
        
        $.ajax({
            url:url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method:'POST',
            data:{
                id_employee:id_employee,
            },
            // beforeSend: function() {
            //     swal.fire({
            //         html: '<h5>Tambah Member dalam proses...</h5>',
            //         showConfirmButton: false,
            //         allowEscapeKey: false,
            //         allowOutsideClick: false,
                    
            //         onRender: function() {
            //             // there will only ever be one sweet alert open.
            //             $('.swal2-content').prepend(sweet_loader);
            //         }
            //     });
            // },
            success:function(response){
                if (response.success === true) {
                    Swal.fire({
                        title: "Berhasil!",
                        text: response.message,
                        icon: "success"
                    }).then(function() {
                        // Redirect the user
                        window.location.href = "/grup";
                    });
                }
            },
            error:function(response){
                Swal.fire({
                    title: "Gagal",
                    text: "Data Tambah Member Harus Terisi Lengkap",
                    icon: "error"
                }).then(function() {
                    // Redirect the user
                    window.location.href = "/grup/tambah";
                });
            }
        });
    });
</script>
@endsection


