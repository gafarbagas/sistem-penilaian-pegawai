@extends('layouts.admin')

@section('title','Nilai')
    
@section('style')
    <link rel="stylesheet" href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Nilai</h1>
    </div>

    <!-- Content Row -->
    <div class="row text-black mb-5">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm text-black nowrap" width="100%" cellspacing="0" id="projecttable">
                            <thead class="thead">
                                <tr>
                                    <th width=25px>No.</th>
                                    <th>PC Name</th>
                                    <th>Nilai</th>
                                    <th width=60px>Action</th>
                                    
                                </tr>
                            </thead>
    
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->grading ?? '-' }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info shadow-sm mb-1" data-toggle="modal" data-target="#detail{{$employee->id_employee}}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <a href="/nilai/{{$employee->id_employee}}/edit" class="btn btn-sm btn-secondary mb-1"><i class="fa fa-pencil-alt"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Modal Detail Data-->
                                    <div class="modal fade" id="detail{{$employee->id_employee}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Nilai</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-4">
                                                        <label class="col-sm-4">Site Name</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $employee->site->nama_site }}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label class="col-sm-4">Trainer Name</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $employee->employee_id }}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label class="col-sm-4">PC Name</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $employee->name }}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label class="col-sm-4">Nilai</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $employee->grading ?? '-'}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </tbody>
    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
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
@endsection