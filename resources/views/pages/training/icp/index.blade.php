@extends('layouts.admin')

@section('title','In Class Promotor')

@section('style')
    <link rel="stylesheet" href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    @include('pages.training.menu.icp')

    <div class="d-sm-flex align-items-center mb-3">
        <h1 class="h3 text-dark">In Class Promotor</h1>

    </div>

    <!-- Content Row -->
    <div class="row text-dark mb-5">
        <div class="col-md">
            <div class="card">
                @if($user->level == 'Admin')

                @elseif($user->level == 'Trainer')
                <div class="card-header py-3">
                    <a href="{{route('tambahicp')}}" class="btn btn-primary btn-icon-split btn-sm mb-1">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </a>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm text-dark nowrap" width="100%" cellspacing="0" id="projecttable">
                            <thead class="thead">
                                <tr>
                                    <th width=25px>No.</th>
                                    <th>Employee ID</th>
                                    <th>PC Name</th>
                                    <th>Selling Skills</th>
                                    <th>Product Knowledge</th>
                                    @if($user->level == 'Admin')
                                    <th>Trainer</th>
                                    @elseif($user->level == 'Trainer')
                                    @endif
                                    <th width=100px>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($icps as $key => $icp)
                                    <tr>
                                        <td>{{ $icps->firstItem() + $key }}.</td>
                                        <td>{{ $icp->employee->employee_id }}</td>
                                        <td>{{ $icp->employee->nama_employee }}</td>
                                        <td>
                                            @php
                                            $hasil = ($icp->nilai1 + $icp->nilai2 + $icp->nilai3) / 3;
                                            echo round($hasil);
                                            @endphp
                                        </td>
                                        <td>{{ $icp->nilaipost }}</td>
                                        @if($user->level == 'Admin')
                                        <td>{{$icp->trainer->nama_trainer}}</td>
                                        @elseif($user->level == 'Trainer')
                                        @endif
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#detail{{$icp->id_icp}}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <a href="/training/icp/{{$icp->id_icp}}/edit" class="btn btn-secondary btn-sm shadow-sm">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            @if($user->level == 'Admin')
                                            <a href="/training/icp/{{$icp->id_icp}}/hapus" class="btn btn-danger btn-sm btn-flat delete-confirm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            @elseif($user->level == 'Trainer')
                                            @endif
                                        </td>
                                    </tr>
                                    <!-- Modal Detail Data-->
                                    <div class="modal fade" id="detail{{$icp->id_icp}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail In Class Promotor</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Tanggal Training</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ Carbon\Carbon::parse($icp->tanggal)->format('d-m-Y') }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Employee ID</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icp->employee->employee_id }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">PC Name</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icp->employee->nama_employee }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Nama Trainer</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icp->trainer->nama_trainer }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Feature 1</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icp->nilai1}}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Feature 2</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icp->nilai2 }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Feature 3</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icp->nilai3 }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Produk yang Diajarkan</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icp->produk }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Pre Test</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icp->nilaipre }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Post Test</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icp->nilaipost }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="float:left">
                            Menampilkan {!! $icps->firstItem() !!}
                            sampai  {!! $icps->lastItem() !!}
                            dari {!! $icps->total() !!} data

                        </div>
                        <div style="float:right">
                            {!! $icps->links() !!}
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
