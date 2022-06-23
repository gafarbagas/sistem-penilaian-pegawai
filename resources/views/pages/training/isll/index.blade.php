@extends('layouts.admin')

@section('title','In Store Lain-Lain')

@section('style')
    <link rel="stylesheet" href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    @include('pages.training.menu.isll')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-3">
        <h1 class="h3 text-dark">In Store Lain-Lain</h1>

    </div>

    <!-- Content Row -->
    <div class="row text-dark mb-5">
        <div class="col-md">
            <div class="card">
                @if($user->level == 'Admin')

                @elseif($user->level == 'Trainer')
                <div class="card-header py-3">
                    <a href="{{route('tambahisll')}}" class="btn btn-primary btn-icon-split btn-sm mb-1">
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
                                    <th>Produk yang Diajarkan</th>
                                    <th>Average Score</th>
                                    @if($user->level == 'Admin')
                                    <th>Trainer</th>
                                    @elseif($user->level == 'Trainer')
                                    @endif
                                    <th width=100px>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($islls as $key => $isll)
                                    <tr>
                                        <td>{{ $islls->firstItem() + $key }}.</td>
                                        <td>{{ $isll->employee_id }}</td>
                                        <td>{{ $isll->nama_employee }}</td>
                                        <td>{{ $isll->produk }}</td>
                                        <td>
                                            @php
                                                $sellingSkill = ($isll->nilai_selling1 + $isll->nilai_selling2 + $isll->nilai_selling3 + $isll->nilai_selling4 + $isll->nilai_selling5 + $isll->nilai_selling6 + $isll->nilai_selling7 + $isll->nilai_selling8 + $isll->nilai_selling9 + $isll->nilai_selling10) / 10;

                                                $productKnowledge = ($isll->nilai_produk1 + $isll->nilai_produk2 + $isll->nilai_produk3 + $isll->nilai_produk4 + $isll->nilai_produk5) / 5;

                                                $marketKnowledge = ($isll->nilai_knowledge1 + $isll->nilai_knowledge2 + $isll->nilai_knowledge3 + $isll->nilai_knowledge4 + $isll->nilai_knowledge5) / 5;

                                                $total = ($sellingSkill + $productKnowledge + $marketKnowledge) / 3;
                                                echo round($total);
                                            @endphp
                                        </td>
                                            @if($user->level == 'Admin')
                                            <td>{{$isll->trainer->nama_trainer}}</td>
                                            @elseif($user->level == 'Trainer')
                                            @endif
                                        <td>
                                            <button type="button" class="btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#detail{{$isll->id_isl}}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <a href="/training/isll/{{$isll->id_isl}}/edit" class="btn btn-secondary btn-sm shadow-sm">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            @if($user->level == 'Admin')
                                            <a href="/training/isll/{{$isll->id_isl}}/hapus" class="btn btn-danger btn-sm btn-flat delete-confirm">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            @elseif($user->level == 'Trainer')
                                            @endif
                                        </td>
                                    </tr>
                                    <!-- Modal Detail Data-->
                                    <div class="modal fade" id="detail{{$isll->id_isl}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detail In Store Lain-Lain</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Tanggal</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ Carbon\Carbon::parse($isll->tanggal)->format('d-m-Y') }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Employee ID</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $isll->employee_id }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">PC Name</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $isll->nama_employee }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Instore Ke</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $isll->instore }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Jenis Instore</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $isll->jenis }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Produk yang Diajarkan</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $isll->produk }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Jenis Produk</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $isll->jenis_ajar ?? '-' }}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Tipe Produk</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $isll->tipe_produk}}</div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Issue</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">{{ $isll->issue}}</div>
                                                    </div>

                                                    <div class="row mb-2">
                                                        <label class="col-sm-5"><b>Scoring</b></label>
                                                    </div>

                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Selling Skill</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">
                                                            @php
                                                            $hasil = ($isll->nilai_selling1 + $isll->nilai_selling2 + $isll->nilai_selling3 +
                                                            $isll->nilai_selling4 + $isll->nilai_selling5 + $isll->nilai_selling6 + $isll->nilai_selling7
                                                            + $isll->nilai_selling8 + $isll->nilai_selling9 + $isll->nilai_selling10) / 10;
                                                            echo $hasil;
                                                            @endphp
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Product Knowledge</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">
                                                            @php
                                                                $hasil = ($isll->nilai_produk1 + $isll->nilai_produk2 + $isll->nilai_produk3 +
                                                                $isll->nilai_produk4 + $isll->nilai_produk5) / 5;
                                                                echo $hasil;
                                                            @endphp
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Market Knowledge</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">
                                                            @php
                                                                $hasil = ($isll->nilai_knowledge1 + $isll->nilai_knowledge2 + $isll->nilai_knowledge3 +
                                                                $isll->nilai_knowledge4 + $isll->nilai_knowledge5) / 5;
                                                                echo $hasil;
                                                            @endphp
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Average Score</label>
                                                        <label class="d-none d-sm-inline col-sm-1">:</label>
                                                        <div class="col-sm">
                                                            @php
                                                                $sellingSkill = ($isll->nilai_selling1 + $isll->nilai_selling2 + $isll->nilai_selling3 + $isll->nilai_selling4 + $isll->nilai_selling5 + $isll->nilai_selling6 + $isll->nilai_selling7 + $isll->nilai_selling8 + $isll->nilai_selling9 + $isll->nilai_selling10) / 10;

                                                                $productKnowledge = ($isll->nilai_produk1 + $isll->nilai_produk2 + $isll->nilai_produk3 + $isll->nilai_produk4 + $isll->nilai_produk5) / 5;

                                                                $marketKnowledge = ($isll->nilai_knowledge1 + $isll->nilai_knowledge2 + $isll->nilai_knowledge3 + $isll->nilai_knowledge4 + $isll->nilai_knowledge5) / 5;

                                                                $total = ($sellingSkill + $productKnowledge + $marketKnowledge) / 3;
                                                                echo round($total);
                                                            @endphp
                                                        </div>
                                                    </div>

                                                    <div class="row mb-2">
                                                        <label class="col-sm-5">Gambar</label>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm">
                                                            <img src="/admin/img/gambar_aktivitas/{{$isll->gambar}}" width="300">
                                                            <a href="/training/gambar_aktivitas/{{\Crypt::encrypt($isll->id_isl)}}" target="_blank" class="btn btn-sm btn-info">Unduh <i class="fa fa-download"></i></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <div style="float:left">
                            Menampilkan {!! $islls->firstItem() !!}
                            sampai  {!! $islls->lastItem() !!}
                            dari {!! $islls->total() !!} data

                        </div>
                        <div style="float:right">
                            {!! $islls->links() !!}
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
