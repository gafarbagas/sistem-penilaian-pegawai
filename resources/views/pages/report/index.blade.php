@extends('layouts.admin')

@section('title','Report')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Report</h1>
    </div>

    <div class="row text-dark mb-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    @if ($userLevel == 'Admin')
                        <form action="/reportAdmin" method="POST">
                    @elseif($userLevel == 'Trainer')
                        <form action="/reportTrainer" method="POST">
                    @endif
                    @csrf
                        <div class="form-group">
                            <label class="text-black">Training</label>
                            <select type="text" class="form-control col-sm-6 @error('training') is-invalid @enderror" name="training" id="training">
                                <option value="">- Pilih Jenis Training -</option>
                                <option value="inclassfsm" @if (old('training') == "inclassfsm") {{ 'selected' }} @endif>In Class FSM</option>
                                <option value="inclasslain" @if (old('training') == "inclasslain") {{ 'selected' }} @endif>In Class Lain-Lain</option>
                                <option value="inclasspromotor" @if (old('training') == "inclasspromotor") {{ 'selected' }} @endif>In Class Promotor</option>
                                <option value="inclasssalesman" @if (old('training') == "inclasssalesman") {{ 'selected' }} @endif>In Class Salesman</option>
                                <option value="instorepromotor" @if (old('training') == "instorepromotor") {{ 'selected' }} @endif>In Store Promotor</option>
                                <option value="instorelain" @if (old('training') == "instorelain") {{ 'selected' }} @endif>In Store Lain-Lain</option>
                            </select>
                            @error('training')
                                <div class="invalid-feedback"> {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="text-black">Tanggal Kegiatan</label>
                            <div class="form-grup row">
                                <div class="col-sm-5">
                                    <input type="date" class="form-control @error('tgl_awal') is-invalid @enderror" name="tgl_awal" placeholder="Tanggal Awal" value="{{old('tgl_awal')}}">
                                    @error('tgl_awal')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-1 mt-2 text-center">
                                    <i class="fa fa-minus"></i>
                                </div>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control @error('tgl_akhir') is-invalid @enderror" name="tgl_akhir" placeholder="Tanggal Akhir"value="{{old('tgl_akhir')}}">
                                    @error('tgl_akhir')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-sm">
                                <button class="btn btn-secondary btn-icon-split mb-1" type="submit">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-print"></i>
                                    </span>
                                    <span class="text">Print Report</span>
                                </button>
                                {{-- <button class="btn btn-secondary" type="submit"><i class="fa fa-print"></i> Print Report</button> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</div>

@endsection