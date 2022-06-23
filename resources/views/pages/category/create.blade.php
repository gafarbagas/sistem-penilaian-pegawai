@extends('layouts.admin')

@section('title','Tambah Product yang diajarkan')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Tambah Produk yang diajarkan</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    <form action="/category" method="POST">
                    @csrf

                        <div class="form-group row">
                            <label for="nama_kategori" class="col-sm-3 col-form-label">Nama Produk yang diajarkan</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" id="nama_kategori" placeholder="Nama Produk" value="{{ old('nama_kategori') }}">
                                @error('nama_trainer')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>                            
                
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection


