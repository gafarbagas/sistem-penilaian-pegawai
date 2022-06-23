@extends('layouts.admin')

@section('title','Tambah Employee')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Tambah Employee</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    <form action="/employee" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="id_site"  class="col-sm-2 col-form-label">Site ID</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control @error('id_site') is-invalid @enderror" name="id_site" id="id_site" placeholder="Site ID" value="{{ old('id_site') }}">
                            @error('id_site')
                            <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_site"  class="col-sm-2 col-form-label">Site Name</label>
                        <div class="col-sm">
                            <input type="text" class="form-control @error('nama_site') is-invalid @enderror" name="nama_site" id="nama_site" placeholder="Site Name" value="{{ old('nama_site') }}">
                            @error('nama_site')
                            <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="employee_id"  class="col-sm-2 col-form-label">Employee ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" id="employee_id" placeholder="Employee ID" value="{{ old('employee_id') }}">
                                @error('employee_id')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_employee"  class="col-sm-2 col-form-label">PC Name</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('nama_employee') is-invalid @enderror" name="nama_employee" id="nama_employee" placeholder="PC Name" value="{{ old('nama_employee') }}">
                                @error('nama_employee')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="grading"  class="col-sm-2 col-form-label">Grading</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('grading') is-invalid @enderror" name="grading" id="grading">
                                    <option value="" disabled selected>Pilih Grading</option>
                                    <option value="ASSOCIATE">ASSOCIATE</option>
                                    <option value="ROOKIE">ROOKIE</option>
                                    <option value="EXPERT">EXPERT</option>
                                    <option value="MASTER">MASTER</option>
                                </select>
                                @error('grading')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status"  class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                    <option value="" disabled selected>Pilih status</option>
                                    <option value="HA">HA</option>
                                    <option value="AV">AV</option>
                                    <option value="HYBRID">HYBRID</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status_employee"  class="col-sm-2 col-form-label">Status Employee</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('status_employee') is-invalid @enderror" name="status_employee" id="status_employee">
                                    <option value="" disabled selected>Pilih Status Employee</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Nonaktif">Nonaktif</option>
                                </select>
                                @error('status_employee')
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


