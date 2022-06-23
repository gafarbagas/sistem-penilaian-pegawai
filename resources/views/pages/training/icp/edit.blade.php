@extends('layouts.admin')

@section('title','Edit In Class Promotor')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Edit In Class Promotor</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    <form action="/training/icp/update/{{$icp->id_icp}}" method="POST">
                        @method('PATCH')
                        @csrf
                        
                        <div class="form-group row">
                            <label for="employee_id"  class="col-sm-3 col-form-label">Employee ID</label>
                            <div class="col-sm">
                                <input type="text" readonly value="{{$icp->employee->employee_id}}" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" id="employee_id" placeholder="Employee ID" value="{{ old('employee_id') }}">
                                @error('employee_id')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="nama_employee"  class="col-sm-3 col-form-label">Nama Peserta Training</label>
                            <div class="col-sm">
                                <input type="text" readonly value="{{$icp->employee->nama_employee}}" class="form-control @error('nama_employee') is-invalid @enderror" name="nama_employee" id="nama_employee" placeholder="Nama Peserta Training" value="{{ old('nama_employee') }}">
                                @error('nama_employee')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal"  class="col-sm-3 col-form-label">Tanggal Aktifitas Training</label>
                            <div class="col-sm-3">
                                <input type="date" value="{{$icp->tanggal}}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal" placeholder="Tanggal Aktifitas Training" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="nama_trainer"  class="col-sm-3 col-form-label">Nama Trainer Training</label>
                                <div class="col-sm">
                                    <input type="text" readonly value="{{$icp->trainer->nama_trainer}}" class="form-control @error('nama_trainer') is-invalid @enderror" name="nama_trainer" id="nama_trainer" placeholder="Nama Trainer Training" value="{{ old('nama_trainer') }}">
                                    @error('nama_trainer')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nilai1"  class="col-sm-3 col-form-label">Selling Skill (Feature 1)</label>
                                <div class="col-sm-4">
                                    <select class="form-control @error('nilai1') is-invalid @enderror" name="nilai1" id="nilai1">
                                        <option value="" disabled selected>Edit Nilai Feature 1</option>
                                        <option value="60" @if($icp->nilai1 == '60') selected @endif>60</option>
                                        <option value="70" @if($icp->nilai1 == '70') selected @endif>70</option>
                                        <option value="80" @if($icp->nilai1 == '80') selected @endif>80</option>
                                        <option value="90" @if($icp->nilai1 == '90') selected @endif>90</option>
                                        <option value="100" @if($icp->nilai1 == '100') selected @endif>100</option>
                                    </select>
                                    @error('nilai1')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nilai2"  class="col-sm-3 col-form-label">Selling Skill (Feature 2)</label>
                                <div class="col-sm-4">
                                    <select class="form-control @error('nilai2') is-invalid @enderror" name="nilai2" id="nilai2">
                                        <option value="" disabled selected>Edit Nilai Feature 2</option>
                                        <option value="60" @if($icp->nilai2 == '60') selected @endif>60</option>
                                        <option value="70" @if($icp->nilai2 == '70') selected @endif>70</option>
                                        <option value="80" @if($icp->nilai2 == '80') selected @endif>80</option>
                                        <option value="90" @if($icp->nilai2 == '90') selected @endif>90</option>
                                        <option value="100" @if($icp->nilai2 == '100') selected @endif>100</option>
                                    </select>
                                    @error('nilai2')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nilai3"  class="col-sm-3 col-form-label">Selling Skill (Feature 3)</label>
                                <div class="col-sm-4">
                                    <select class="form-control @error('nilai3') is-invalid @enderror" name="nilai3" id="nilai3">
                                        <option value="" disabled selected>Edit Nilai Feature 3</option>
                                        <option value="60" @if($icp->nilai3 =='60') selected @endif>60</option>
                                        <option value="70" @if($icp->nilai3 =='70') selected @endif>70</option>
                                        <option value="80" @if($icp->nilai3 =='80') selected @endif>80</option>
                                        <option value="90" @if($icp->nilai3 =='90') selected @endif>90</option>
                                        <option value="100" @if($icp->nilai3 =='100') selected @endif>100</option>
                                    </select>
                                    @error('nilai3')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="produk"  class="col-sm-3 col-form-label">Produk yang Diajarkan</label>
                                <div class="col-sm-4">
                                    <input type="text" value="{{$icp->produk}}" class="form-control @error('produk') is-invalid @enderror" name="produk" id="produk" placeholder="Produk yang Diajarkan" value="{{ old('produk') }}">
                                    @error('produk')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nilaipre"  class="col-sm-3 col-form-label">Nilai Pre Test</label>
                                <div class="col-sm-2">
                                    <input type="number" value="{{$icp->nilaipre}}" class="form-control @error('nilaipre') is-invalid @enderror" name="nilaipre" id="nilaipre" placeholder="Pre Test" value="{{ old('nilaipre') }}">
                                    @error('nilaipre')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nilaipost"  class="col-sm-3 col-form-label">Nilai Post Test</label>
                                <div class="col-sm-2">
                                    <input type="number" value="{{$icp->nilaipost}}" class="form-control @error('nilaipost') is-invalid @enderror" name="nilaipost" id="nilaipost" placeholder="Post Test" value="{{ old('nilaipost') }}">
                                    @error('nilaipost')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
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


