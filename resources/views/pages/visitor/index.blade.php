@extends('layouts.admin')

@section('title','Visitor')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Visitor</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    <form name="filter_form" method="POST" action="/visitor">
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="form-group row mb-5">
                            <label for="employee_id"  class="col-sm-2 col-form-label">Employee ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="employee_id" id="employee_id" placeholder="Employee ID" value="{{ old('employee_id') }}">
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-secondary btn-filter" type="button"><i class="fa fa-search"></i></button>
                            </div>
                        </div>

                        <div class="list-detail">
                                
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
        var name = $('input[name=employee_id]').val();
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
        url: "{{ url('/visitor/ambildata') }}",
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
                        window.location.href = "/visitor";
                    });
            }else{
                $('.list-detail').html(data);
            }
        }
        });
    });
</script>
@endsection


