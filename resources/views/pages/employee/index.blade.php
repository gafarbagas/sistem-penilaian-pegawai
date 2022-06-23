@extends('layouts.admin')

@section('title','Employee')

@section('style')
    <link rel="stylesheet" href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Employee</h1>
        @if(isset($errors) && $errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
        @endif
    </div>

    <!-- Content Row -->
    <div class="row text-dark mb-5">
        <div class="col-md">
            <div class="card">
                <div class="card-header py-3">
                    <a href="{{route('tambahemployee')}}" class="btn btn-primary btn-icon-split btn-sm mb-1">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </a>
                    <!-- Button trigger modal -->
                <button type="button" class="btn btn-success btn-icon-split btn-sm mb-1" data-toggle="modal" data-target="#exampleModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Import</span>
                </button>
                <a href="{{route('export')}}" class="btn btn-warning btn-icon-split btn-sm mb-1">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Export</span>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">Import Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    @if (session()->has('failures'))
                                        <table class="table table-danger">
                                            <tr>
                                                <th>Row</th>
                                                <th>Attribute</th>
                                                <th>Errors</th>
                                                <th>Value</th>
                                            </tr>
                                            @foreach(session()->get('failures') as $validation)
                                            <tr>
                                                <td>{{$validation->row()}}</td>
                                                <td>{{$validation->attribute()}}</td>
                                                <td>
                                                    <ul>
                                                        @foreach($validation->errors() as $e)
                                                            <li>{{$e}}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{$validation->values()[$validation->attribute()]}}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                    <input type="file" name="file" id="file" required="required">
                                    @error('file')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm text-dark nowrap" width="100%" cellspacing="0" id="projecttable">
                            <thead class="thead">
                                <tr>
                                    <th width=25px>No.</th>
                                    <th>Employee ID</th>
                                    <th>PC Name</th>
                                    <th>Site Name</th>
                                    <th>Status Employee</th>
                                    <th width=100px>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($employees as $key => $employee)
                                    <tr>
                                        <td>{{ $employees->firstItem() + $key }}.</td>
                                        <td>{{ $employee->employee_id }}</td>
                                        <td>{{ $employee->nama_employee }}</td>
                                        <td>{{ $employee->nama_site }}</td>
                                        <td>{{ $employee->status_employee }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info shadow-sm mb-1" data-toggle="modal" data-target="#detail{{$employee->id_employee}}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <a href="/employee/{{$employee->id_employee}}/edit" class="btn btn-secondary btn-sm shadow-sm mb-1">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            {{-- @if(Auth::user()->role_id == '1') --}}
                                            <a href="/employee/{{$employee->id_employee}}/hapus" class="btn btn-sm btn-danger mb-1 delete-confirm"><i class="fa fa-trash"></i></a>
                                            {{-- @endif --}}
                                        </td>
                                    </tr>

                                    <!-- Modal Detail Data-->
                                    <div class="modal fade" id="detail{{$employee->id_employee}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail Employee</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-4">
                                                        <label class="col-sm-4">Site ID</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $employee->id_site }}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label class="col-sm-4">Nama Site</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $employee->nama_site }}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label class="col-sm-4">ID Employee</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $employee->employee_id}}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label class="col-sm-4">Nama Employee</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $employee->nama_employee }}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label class="col-sm-4">Status</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $employee->status }}</div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label class="col-sm-4">Grading</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $employee->grading }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="float:left">
                            Menampilkan {!! $employees->firstItem() !!}
                            sampai  {!! $employees->lastItem() !!}
                            dari {!! $employees->total() !!} data

                        </div>
                        <div style="float:right">
                            {!! $employees->links() !!}
                        </div>
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
            "paging":   false,
            "info":     false
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
