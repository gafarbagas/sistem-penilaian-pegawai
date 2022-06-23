@extends('layouts.admin')

@section('title','In Class FSM')

@section('style')
    <link rel="stylesheet" href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    @include('pages.training.menu.icfsm')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3">
        <h1 class="h3 text-dark">In Class FSM</h1>

    </div>

    <!-- Content Row -->
    <div class="row text-dark mb-5">
        <div class="col-md">
            <div class="card">
                @if($user->level == 'Admin')

                @elseif($user->level == 'Trainer')
                <div class="card-header py-3">
                    <a href="{{route('tambahicfsm')}}" class="btn btn-primary btn-icon-split btn-sm mb-1">
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
                                    <th>PC Name</th>
                                    <th>Status</th>
                                    <th>Kota</th>
                                    <th>Produk yang Diajarkan</th>
                                    <th>Pre Test</th>
                                    <th>Pos Test</th>
                                    @if($user->level == 'Admin')
                                    <th>Trainer</th>
                                    @elseif($user->level == 'Trainer')
                                    @endif
                                    <th width=100px>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($icfsms as $key => $icfsm)
                                    <tr>
                                        <td>{{ $icfsms->firstItem() + $key }}.</td>
                                        <td>{{ $icfsm->nama_employee }}</td>
                                        <td>{{ $icfsm->status }}</td>
                                        <td>{{ $icfsm->kota }}</td>
                                        <td>{{ $icfsm->produk }}</td>
                                        <td>{{ $icfsm->nilaipre }}</td>
                                        <td>{{ $icfsm->nilaipost }}</td>
                                        @if($user->level == 'Admin')
                                        <td>{{$icfsm->trainer->nama_trainer}}</td>
                                        @elseif($user->level == 'Trainer')
                                        @endif
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#detail{{$icfsm->id_icf}}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <a href="/training/icfsm/{{$icfsm->id_icf}}/edit" class="btn btn-secondary btn-sm shadow-sm">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            @if($user->level == 'Admin')
                                            <a href="/training/icfsm/{{$icfsm->id_icf}}/hapus" class="btn btn-danger btn-sm btn-flat delete-confirm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            @elseif($user->level == 'Trainer')
                                            @endif
                                        </td>
                                    </tr>
                                    <!-- Modal Detail Data-->
                                    <div class="modal fade" id="detail{{$icfsm->id_icf}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail In Class FSM</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">Tanggal</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ Carbon\Carbon::parse($icfsm->tanggal)->format('d-m-Y') }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">PC Name</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->nama_employee }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">Email</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->email }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">No Handphone</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->nohp }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">Status FSM</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->status }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">Jabatan</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->jabatan }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">Account</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->account}}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">Nama Toko</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->nama_toko }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">Category</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->category }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">PC Name</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->nama_employee }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">Kota</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->kota }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">Produk yang Diajarkan</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->produk }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">Pre Test</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->nilaipre }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-4">Post Test</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $icfsm->nilaipost }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="float:left">
                            Menampilkan {!! $icfsms->firstItem() !!}
                            sampai  {!! $icfsms->lastItem() !!}
                            dari {!! $icfsms->total() !!} data

                        </div>
                        <div style="float:right">
                            {!! $icfsms->links() !!}
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
