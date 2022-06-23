@extends('layouts.admin')

@section('title','Tambah Trainer')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Tambah Trainer</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    <form action="/trainer" method="POST">
                    @csrf
                        <div class="form-group row">
                            <label for="trainer_id"  class="col-sm-2 col-form-label">Trainer ID</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('trainer_id') is-invalid @enderror" name="trainer_id" id="trainer_id" placeholder="Trainer ID" value="{{ old('trainer_id') }}">
                                @error('trainer_id')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_trainer"  class="col-sm-2 col-form-label">Trainer Name</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('nama_trainer') is-invalid @enderror" name="nama_trainer" id="nama_trainer" placeholder="Trainer Name" value="{{ old('nama_trainer') }}">
                                @error('nama_trainer')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="trainer_area"  class="col-sm-2 col-form-label">Trainer Area</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('trainer_area') is-invalid @enderror" name="trainer_area" id="trainer_area" placeholder="Trainer Area" value="{{ old('trainer_area') }}">
                                @error('trainer_area')
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


