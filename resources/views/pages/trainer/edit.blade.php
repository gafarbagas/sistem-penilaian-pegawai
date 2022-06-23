@extends('layouts.admin')

@section('title','Edit Trainer')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Edit Trainer</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                @foreach($trainer as $trainer)
                <form action="/trainer/update/{{$trainer->id_trainer}}" method="POST">
                    @method('PATCH')
                    @csrf
                        <div class="form-group row">
                            <label for="trainer_id"  class="col-sm-2 col-form-label">ID Trainer</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('trainer_id') is-invalid @enderror" name="trainer_id" id="trainer_id" placeholder="ID Trainer" value="{{ $trainer->trainer_id }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan ID Trainer
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_trainer"  class="col-sm-2 col-form-label">Trainer Name</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('nama_trainer') is-invalid @enderror" name="nama_trainer" id="nama_trainer" placeholder="Trainer Name" value="{{ $trainer->nama_trainer }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Trainer Name
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="trainer_area"  class="col-sm-2 col-form-label">Trainer Area</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('trainer_area') is-invalid @enderror" name="trainer_area" id="trainer_area" placeholder="Trainer Area" value="{{ $trainer->trainer_area }}">
                                <div class="invalid-feedback">
                                    Silahkan Masukan Trainer Area
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="trainer_area"  class="col-sm-2 col-form-label">Trainer Area</label>
                            <div class="col-sm">
                                <a href="/trainer/{{$trainer->id_trainer}}/ubahkatasandi" class="btn btn-info btn-icon-split btn-sm mb-1">
                                    <span class="icon text-white">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    <span class="text">Ubah Kata Sandi</span>
                                </a>
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


