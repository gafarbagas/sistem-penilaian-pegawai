@extends('layouts.admin')

@section('title','Edit Nilai')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-black">Edit Nilai</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-black">
            <div class="card">
                <div class="card-body">
                    <form action="/nilai/update/{{$employee->id_employee}}" method="POST">
                    @method('patch')
                    @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Site Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="{{ $employee->site->nama_site }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">PC Name</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" value="{{ $employee->name }}" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="grading"  class="col-sm-2 col-form-label">Nilai</label>
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
                                <div class="invalid-feedback">
                                    Silahkan Masukan Grading
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


