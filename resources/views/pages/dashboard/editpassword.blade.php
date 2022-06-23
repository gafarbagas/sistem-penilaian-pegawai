@extends('layouts.admin')

@section('title','Ubah Kata Sandi | SISKOR')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Ubah Kata Sandi</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm-6 text-dark">
            <div class="card">
                <div class="card-body">
                    <form action="/ubahkatasandi" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="katasandibaru" class="col-sm-4 col-form-label">Kata Sandi Baru</label>
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