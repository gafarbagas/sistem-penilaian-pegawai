@extends('layouts.admin')

@section('title','Grup')
    
@section('style')
    <link rel="stylesheet" href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section ('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center mb-3">
            <h1 class="h3 text-black">Grup</h1>
        </div>

        <!-- Content Row -->
        <div class="row text-black mb-5">
            <div class="col-md">
                <div class="card">
                    <div class="card-header py-3">
                        <a href="{{route('tambahgrup')}}" class="btn btn-primary btn-icon-split btn-sm mb-1">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Employee ke Grup</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-sm text-black nowrap" width="100%" cellspacing="0" id="projecttable">
                                <thead class="thead">
                                    <tr>
                                        <th width=25px>No.</th>
                                        <th>PC Name</th>
                                        <th>Site Name</th>
                                        <th width=53px>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($grups as $grup)
                                    <tr>
                                        <td class="d-flex justify-content-center">{{ $loop->iteration}}</td>
                                        <td>{{ $grup->employee->nama_employee}}</td>
                                        <td>{{ $grup->employee->nama_site}}</td>
                                        <td>
                                            <!-- Button Lihat Data -->
                                            <button type="button" class="btn btn-info btn-sm btn-flat"
                                                data-toggle="modal" data-target="#lihatinfo{{ $grup->id_grup }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <!-- Modal lihat Data-->
                                            <div class="modal fade" id="lihatinfo{{ $grup->id_grup }}" tabindex="-1" role="dialog" aria-labelledby="lihatinfoLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="lihatinfoLabel">Detail grup</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-4">
                                                                <label class="col-sm-4">Site ID</label>
                                                                <label class="d-none d-sm-inline col-sm-1">:</label>
                                                                <div class="col-sm">{{ $grup->employee->id_site}}</div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label class="col-sm-4">Site Name</label>
                                                                <label class="d-none d-sm-inline col-sm-1">:</label>
                                                                <div class="col-sm">{{ $grup->employee->nama_site}}</div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label class="col-sm-4">Employee ID</label>
                                                                <label class="d-none d-sm-inline col-sm-1">:</label>
                                                                <div class="col-sm">{{ $grup->employee->employee_id }}</div>
                                                            </div>
                                                            <div class="row mb-4">
                                                                <label class="col-sm-4">PC Name</label>
                                                                <label class="d-none d-sm-inline col-sm-1">:</label>
                                                                <div class="col-sm">{{ $grup->employee->nama_employee }}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Link Hapus Data -->
                                            <a href="/grup/{{$grup->id}}/hapus" class="btn btn-danger btn-sm btn-flat delete-confirm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<!-- data tables -->
<script src="{{url('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#projecttable').DataTable({
            "lengthMenu": [[5,10,25,50,-1], [5,10,25,50,"All"]],
            "language": {
            "sEmptyTable":   "Tidak ada data",
            "sProcessing":   "Sedang memproses...",
            "sLengthMenu":   "Tampilkan _MENU_ data",
            "sZeroRecords":  "Tidak ditemukan data yang sesuai",
            "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 data",
            "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
            "sInfoPostFix":  "",
            "sSearch":       "Cari:",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "Pertama",
                "sPrevious": "<",
                "sNext":     ">",
                "sLast":     "Terakhir"
            }
        }
        });
    });
</script>

<script>
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Harap periksa kembali. Data yang akan dihapus tidak akan bisa kembali!",
            icon: 'warning',
            reverseButtons: true,
            showCancelButton: true,
            confirmButtonColor: '#888888',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
            else if ( result.dismiss === Swal.DismissReason.cancel){
                // Swal.fire('Dibatalkan','Data Anda Tersimpan Aman','error');
            }
        });
    });
</script>
@endsection