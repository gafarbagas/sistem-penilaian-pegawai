@extends('layouts.admin')

@section('title','Edit Employee')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Edit Employee</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    @foreach($employee as $employee)
                    <form action="/employee/update/{{$employee->id_employee}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="id_site"  class="col-sm-2 col-form-label">Site ID</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ $employee->id_site }}" class="form-control @error('id_site') is-invalid @enderror" name="id_site" id="id_site" placeholder="Site ID" value="{{ old('id_site') }}">
                                @error('id_site')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_site"  class="col-sm-2 col-form-label">Site Name</label>
                            <div class="col-sm">
                                <input type="text" value="{{ $employee->nama_site }}" class="form-control @error('nama_site') is-invalid @enderror" name="nama_site" id="nama_site" placeholder="Site Name" value="{{ old('nama_site') }}">
                                @error('nama_site')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group row">
                                <label for="employee_id"  class="col-sm-2 col-form-label">Employee ID</label>
                                <div class="col-sm-4">
                                    <input type="text" value="{{ $employee->employee_id }}" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" id="employee_id" placeholder="Site ID" value="{{ old('employee_id') }}">
                                    @error('employee_id')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_employee"  class="col-sm-2 col-form-label">PC Name</label>
                                <div class="col-sm">
                                    <input type="text" value="{{ $employee->nama_employee }}" class="form-control @error('nama_employee') is-invalid @enderror" name="nama_employee" id="nama_employee" placeholder="PC Name" value="{{ old('nama_employee') }}">
                                    @error('name')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="grading"  class="col-sm-2 col-form-label">Grading</label>
                                <div class="col-sm-4">
                                    <select class="form-control @error('grading') is-invalid @enderror" name="grading" id="grading">
                                        <option value="" disabled selected>Pilih Grading</option>
                                        <option value="ASSOCIATE" @if($employee->grading ==
                                            'ASSOCIATE') selected @endif>ASSOCIATE</option>
                                        <option value="ROOKIE" @if($employee->grading ==
                                            'ROOKIE') selected @endif>ROOKIE</option>
                                        <option value="EXPERT" @if($employee->grading ==
                                            'EXPERT') selected @endif>EXPERT</option>
                                        <option value="MASTER" @if($employee->grading ==
                                            'MASTER') selected @endif>MASTER</option>
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
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="HA" @if($employee->status ==
                                            'HA') selected @endif>HA</option>
                                        <option value="AV" @if($employee->status ==
                                            'AV') selected @endif>AV</option>
                                        <option value="HYBRID" @if($employee->status ==
                                            'HYBRID') selected @endif>HYBRID</option>
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
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="Aktif" @if($employee->status_employee ==
                                            'Aktif') selected @endif>Aktif</option>
                                        <option value="Nonaktif" @if($employee->status_employee ==
                                            'Nonaktif') selected @endif>Nonaktif</option>
                                    </select>
                                    @error('status_employee')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    @endforeach
  
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection


