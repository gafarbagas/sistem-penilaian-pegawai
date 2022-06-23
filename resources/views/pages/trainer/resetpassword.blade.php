@extends('layouts.admin')

@section('title','Ubah Kata Sandi Trainer')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->

    <div class="row mb-5">
        <div class="col-md-8 mt-4 mb-4 text-black">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0">Ubah Kata Sandi {{$trainer->nama_trainer}}</h1>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="/trainer/{{$trainer->id_trainer}}/ubahkatasandi" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="katasandibaru" class="col-sm-3 col-form-label">Kata Sandi Baru</label>
                            <div class="col-sm">
                                <input type="password" class="form-control @error('newpassword') is-invalid @enderror" name="newpassword" id="katasandibaru" placeholder="Password">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Kata Sandi Baru
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection