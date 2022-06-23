@extends('layouts.admin')

@section('title','Tambah Jenis Produk yang diajarkan')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Tambah Jenis Produk yang diajarkan</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    <form action="/product" method="POST">
                    @csrf
                        <div class="form-group row">
                            <label for="id_category"  class="col-sm-2 col-form-label">Produk</label>
                            <div class="col-sm-3">
                                <select class="form-control @error('id_category') is-invalid @enderror" name="id_category" id="id_category" value="{{ old('id_category') }}">
                                    <option value="">Pilih Produk</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id_category }}" @if (old('id_category') == "$category->id_category") {{ 'selected' }} @endif>{{ $category->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Silahkan Masukan Produk
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_produk"  class="col-sm-2 col-form-label">Jenis Product</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" id="nama_produk" placeholder="Jenis Product" value="{{ old('nama_produk') }}">
                                @error('nama_produk')
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


