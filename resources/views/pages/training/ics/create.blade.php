@extends('layouts.admin')

@section('title','Tambah In Class Salesman')
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Tambah In Class Salesman</h1>
    </div>
     
    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tambahdataics')}}" method="POST">
                    @csrf
                        <div class="form-group row">
                            <label for="tanggal"  class="col-sm-3 col-form-label">Tanggal Aktifitas Training</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal" placeholder="Tanggal" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="employee_id"  class="col-sm-3 col-form-label">ID Employee</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" id="employee_id" placeholder="ID Employee" value="{{ old('employee_id') }}">
                                @error('employee_id')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_employee"  class="col-sm-3 col-form-label">Nama Peserta Training</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('nama_employee') is-invalid @enderror" name="nama_employee" id="nama_employee" placeholder="Nama Peserta Training" value="{{ old('nama_employee') }}">
                                @error('nama_employee')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="trainer_id"  class="col-sm-3 col-form-label">Nama Trainer Training</label>
                            <div class="col-sm">
                                <input type="text" readonly value="{{ $trainer->nama_trainer }}" class="form-control @error('trainer_id') is-invalid @enderror" name="trainer_id" id="trainer_id" placeholder="Nama Trainer" value="{{ old('trainer_id') }}">
                            </div>
                        </div>

                        <input type="hidden" name="id_trainer" value="{{$trainer->id_trainer}}">
                        <div class="form-group row">
                            <label for="produk"  class="col-sm-3 col-form-label">Produk yang Diajarkan</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('produk') is-invalid @enderror" name="produk" id="produk" placeholder="Produk yang Diajarkan" value="{{ old('produk') }}">
                                @error('produk')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nilaipre"  class="col-sm-3 col-form-label">Nilai Pretest</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control @error('nilaipre') is-invalid @enderror" name="nilaipre" id="nilaipre" placeholder="Nilai Pretest" value="{{ old('nilaipre') }}">
                                @error('nilaipre')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nilaipost"  class="col-sm-3 col-form-label">Nilai Post Test</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control @error('nilaipost') is-invalid @enderror" name="nilaipost" id="nilaipost" placeholder="Nilai Post Test" value="{{ old('nilaipost') }}">
                                @error('nilaipost')
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


