@extends('layouts.admin')

@section('title','Edit Jenis Produk Yang Diajarkan')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Edit Jenis Produk Yang Diajarkan</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                <form action="/product/update/{{$product->id_product }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <label for="id_category" class="col-sm-2 col-form-label">Product</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="{{ $product->category->nama_kategori }}" disabled>
                            <div class="invalid-feedback">
                                Silahkan Masukan Hak Akses
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nama_produk"  class="col-sm-2 col-form-label">Jenis Product</label>
                        <div class="col-sm">
                            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" id="nama_produk" placeholder="Jenis Product" value="{{ $product->nama_produk }}">
                            <div class="invalid-feedback">
                                Silahkan Masukan Jenis Product
                            </div>
                        </div>
                    </div>  
                            
                
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection


