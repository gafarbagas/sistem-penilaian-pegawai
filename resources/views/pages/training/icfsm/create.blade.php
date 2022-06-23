@extends('layouts.admin')

@section('title','Tambah In Class FSM')
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Tambah In Class FSM</h1>
    </div>
     
    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tambahdataicfsm')}}" method="POST">
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
                            <label for="nama_employee"  class="col-sm-3 col-form-label">Nama Peserta Training</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('nama_employee') is-invalid @enderror" name="nama_employee" id="nama_employee" placeholder="Nama Peserta Training" value="{{ old('nama_employee') }}">
                                @error('nama_employee')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_trainer"  class="col-sm-3 col-form-label">Nama Trainer Training</label>
                            <div class="col-sm">
                                <input type="text" readonly value="{{ $trainer->nama_trainer }}" class="form-control @error('nama_trainer') is-invalid @enderror" name="nama_trainer" id="nama_trainer" placeholder="Nama Trainer" value="{{ old('nama_trainer') }}">
                            </div>
                        </div>

                        <input type="hidden" name="id_trainer" value="{{$trainer->id_trainer}}">

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nohp"  class="col-sm-3 col-form-label">No Handphone</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="nohp" placeholder="No Handphone" value="{{ old('nohp') }}">
                                @error('nohp')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status"  class="col-sm-3 col-form-label">Status FSM</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                    <option value="" disabled selected>Pilih Status FSM</option>
                                    <option value="New FSM" @if(old('status')=='New FSM' ) selected @endif>New FSM</option>
                                    <option value="Retrain" @if(old('status')=='Retrain' ) selected @endif>Retrain</option>
                                </select>
                                @error('jabatan')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan"  class="col-sm-3 col-form-label">Jabatan FSM</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan">
                                    <option value="" disabled selected>Pilih Jabatan FSM</option>
                                    <option value="Sales FSM" @if(old('jabatan')=='Sales FSM' ) selected @endif>Sales FSM</option>
                                    <option value="Sales Competitor" @if(old('jabatan')=='Sales Competitor' ) selected @endif>Sales Competitor</option>
                                    <option value="Leasing" @if(old('jabatan')=='Leasing' ) selected @endif>Leasing</option>
                                    <option value="Others" @if(old('jabatan')=='Others' ) selected @endif>Others</option>
                                </select>
                                @error('jabatan')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="account"  class="col-sm-3 col-form-label">Account Group</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('account') is-invalid @enderror" name="account" id="account">
                                    <option value="" disabled selected>Pilih Account Group</option>
                                    <option value="Best Denki" @if(old('account')=='Best Denki' ) selected @endif>Best Denki</option>
                                    <option value="Carrefour" @if(old('account')=='Carrefour' ) selected @endif>Carrefour</option>
                                    <option value="Courts" @if(old('account')=='Courts' ) selected @endif>Courts</option>
                                    <option value="Electronic City" @if(old('account')=='Electronic City' ) selected @endif>Electronic City</option>
                                    <option value="Erajaya" @if(old('account')=='Erajaya' ) selected @endif>Erajaya</option>
                                    <option value="Giant" @if(old('account')=='Giant' ) selected @endif>Giant</option>
                                    <option value="Hypermart" @if(old('account')=='Hypermart' ) selected @endif>Hypermart</option>
                                    <option value="Lottemart" @if(old('account')=='Lottemart' ) selected @endif>Lottemart</option>
                                    <option value="Traditional" @if(old('account')=='Traditional' ) selected @endif>Traditional</option>
                                    <option value="White Brown" @if(old('account')=='White Brown' ) selected @endif>White Brown</option>
                                    <option value="SES Store" @if(old('account')=='SES Store' ) selected @endif>SES Store</option>
                                </select>
                                @error('account')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_toko"  class="col-sm-3 col-form-label">Nama Toko</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('nama_toko') is-invalid @enderror" name="nama_toko" id="nama_toko" placeholder="Nama Toko" value="{{ old('nama_toko') }}">
                                @error('nama_toko')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category"  class="col-sm-3 col-form-label">Category FSM</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('category') is-invalid @enderror" name="category" id="category">
                                    <option value="" disabled selected>Pilih FSM Category</option>
                                    <option value="Direct"  @if(old('category')=='Direct') selected @endif>Direct</option>
                                    <option value="Indirect"  @if(old('category')=='Indirect') selected @endif>Indirect</option>
                                </select>
                                @error('category')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota"  class="col-sm-3 col-form-label">Kota </label>
                            <div class="col-sm-4">
                                <select class="form-control @error('kota') is-invalid @enderror" name="kota" id="kota">
                                    <option value="" disabled selected>Pilih Kota</option>
                                    <option value="Jabodetabek" @if(old('kota')=='Jabodetabek') selected @endif>Jabodetabek</option>
                                    <option value="Kota Medan" @if(old('kota')=='Kota Medan') selected @endif>Kota Medan</option>
                                    <option value="Kota Batam" @if(old('kota')=='Kota Batam') selected @endif>Kota Batam</option>
                                    <option value="Kota Banda Aceh" @if(old('kota')=='Kota Banda Aceh') selected @endif>Kota Banda Aceh</option>
                                    <option value="Kota Pekanbaru" @if(old('kota')=='Kota Pekanbaru') selected @endif>Kota Pekanbaru</option>
                                    <option value="Kota Padang" @if(old('kota')=='Kota Padang') selected @endif>Kota Padang</option>
                                    <option value="Kota Palembang" @if(old('kota')=='Kota Palembang') selected @endif>Kota Palembang</option>
                                    <option value="Kota Jambi" @if(old('kota')=='Kota Jambi') selected @endif>Kota Jambi</option>
                                    <option value="Kota Pangkal Pinang" @if(old('kota')=='Kota Pangkal Pinang') selected @endif>Kota Pangkal Pinang</option>
                                    <option value="Kota Bengkulu" @if(old('kota')=='Kota Bengkulu') selected @endif>Kota Bengkulu</option>
                                    <option value="Kota Samarinda" @if(old('kota')=='Kota Samarinda') selected @endif>Kota Samarinda</option>
                                    <option value="Kota Balikpapan" @if(old('kota')=='Kota Balikpapan') selected @endif>Kota Balikpapan</option>
                                    <option value="Kota Tarakan" @if(old('kota')=='Kota Tarakan') selected @endif>Kota Tarakan</option>
                                    <option value="Kota Banjarmasin" @if(old('kota')=='Kota Banjarmasin') selected @endif>Kota Banjarmasin</option>
                                    <option value="Kota Makassar" @if(old('kota')=='Kota Makassar') selected @endif>Kota Makassar</option>
                                    <option value="Kota Ambon" @if(old('kota')=='Kota Ambon') selected @endif>Kota Ambon</option>
                                    <option value="Kota Jayapura" @if(old('kota')=='Kota Jayapura') selected @endif>Kota Jayapura</option>
                                    <option value="Kota Kendari" @if(old('kota')=='Kota Kendari') selected @endif>Kota Kendari</option>
                                    <option value="Kota Manado" @if(old('kota')=='Kota Manado') selected @endif>Kota Manado</option>
                                    <option value="Kota Palu" @if(old('kota')=='Kota Palu') selected @endif>Kota Palu</option>
                                    <option value="Kota Luwuk" @if(old('kota')=='Kota Luwuk') selected @endif>Kota Luwuk</option>
                                    <option value="Kota Gorontalo" @if(old('kota')=='Kota Gorontalo') selected @endif>Kota Gorontalo</option>
                                    <option value="Kota Denpasar" @if(old('kota')=='Kota Denpasar') selected @endif>Kota Denpasar</option>
                                    <option value="Kota Mataram" @if(old('kota')=='Kota Mataram') selected @endif>Kota Mataram</option>
                                    <option value="Kota Kupang" @if(old('kota')=='Kota Kupang') selected @endif>Kota Kupang</option>
                                    <option value="Kota Surabaya" @if(old('kota')=='Kota Surabaya') selected @endif>Kota Surabaya</option>
                                    <option value="Kota Malang" @if(old('kota')=='Kota Malang') selected @endif>Kota Malang</option>
                                    <option value="Kota Jember" @if(old('kota')=='Kota Jember') selected @endif>Kota Jember</option>
                                    <option value="Kota Kediri" @if(old('kota')=='Kota Kediri') selected @endif>Kota Kediri</option>
                                    <option value="Kota Semarang" @if(old('kota')=='Kota Semarang') selected @endif>Kota Semarang</option>
                                    <option value="Kota Tegal" @if(old('kota')=='Kota Tegal') selected @endif>Kota Tegal</option>
                                    <option value="Kota Yogyakarta" @if(old('kota')=='Kota Yogyakarta') selected @endif>Kota Yogyakarta</option>
                                    <option value="Kota Solo" @if(old('kota')=='Kota Solo') selected @endif>Kota Solo</option>
                                    <option value="Kota Purwokerto" @if(old('kota')=='Kota Purwokerto') selected @endif>Kota Purwokerto</option>
                                    <option value="Kota Bandung" @if(old('kota')=='Kota Bandung') selected @endif>Kota Bandung</option>
                                    <option value="Kota Cirebon" @if(old('kota')=='Kota Cirebon') selected @endif>Kota Cirebon</option>
                                    <option value="Kota Garut" @if(old('kota')=='Kota Garut') selected @endif>Kota Garut</option>
                                    <option value="Kota Tasikmalaya" @if(old('kota')=='Kota Tasikmalaya') selected @endif>Kota Tasikmalaya</option>
                                    <option value="Kota Bandar Lampung" @if(old('kota')=='Kota Bandar Lampung') selected @endif>Kota Bandar Lampung</option>
                                    <option value="Kota Pontianak" @if(old('kota')=='Kota Pontianak') selected @endif>Kota Pontianak</option>
                                </select>
                                @error('kota')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
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


