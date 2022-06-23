@extends('layouts.admin')

@section('title','Edit In Class FSM')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Edit In Class FSM</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    <form action="/training/icfsm/update/{{$icfsm->id_icf}}" method="POST">
                    @method('PATCH')
                    @csrf
                        <div class="form-group row">
                            <label for="tanggal"  class="col-sm-3 col-form-label">Tanggal Aktifitas Training</label>
                            <div class="col-sm-3">
                                <input type="date" value="{{$icfsm->tanggal}}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal" placeholder="Tanggal Aktifitas Training" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="nama_employee"  class="col-sm-3 col-form-label">Nama Peserta Training</label>
                            <div class="col-sm">
                                <input type="text" readonly value="{{$icfsm->nama_employee}}" class="form-control @error('nama_employee') is-invalid @enderror" name="nama_employee" id="nama_employee" placeholder="Nama Peserta Training" value="{{ old('nama_employee') }}">
                                @error('nama_employee')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="trainer_id"  class="col-sm-3 col-form-label">Nama Trainer Training</label>
                            <div class="col-sm">
                                <input type="text" readonly value="{{$icfsm->trainer->nama_trainer}}" class="form-control @error('trainer_id') is-invalid @enderror" name="trainer_id" id="trainer_id" placeholder="Nama Trainer Training" value="{{ old('trainer_id') }}">
                                @error('trainer_id')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email"  class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm">
                                <input type="email" value="{{$icfsm->email}}" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nohp"  class="col-sm-3 col-form-label">No Handphone</label>
                            <div class="col-sm">
                                <input type="text" value="{{$icfsm->nohp}}" class="form-control @error('nohp') is-invalid @enderror" name="nohp" id="nohp" placeholder="No Handphone" value="{{ old('nohp') }}">
                                @error('nohp')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status"  class="col-sm-3 col-form-label">Status FSM</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                                    <option value="New FSM" @if($icfsm->status == 'New FSM') selected @endif>New FSM</option>
                                    <option value="Retrain" @if($icfsm->status == 'Retrain') selected @endif>Retrain</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan"  class="col-sm-3 col-form-label">Jabatan FSM</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan">
                                    <option value="Sales FSM" @if($icfsm->jabatan == 'Sales FSM') selected @endif>Sales FSM</option>
                                    <option value="Sales Competitor" @if($icfsm->jabatan == 'Sales Competitor') selected @endif>Sales Competitor</option>
                                    <option value="Leasing" @if($icfsm->jabatan == 'Leasing') selected @endif>Leasing</option>
                                    <option value="Others" @if($icfsm->jabatan == 'Others') selected @endif>Others</option>
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
                                    <option value="Best Denki" @if($icfsm->account == 'Best Denki') selected @endif>Best Denki</option>
                                    <option value="Carrefour" @if($icfsm->account == 'Carrefour') selected @endif>Carrefour</option>
                                    <option value="Courts" @if($icfsm->account == 'Courts') selected @endif>Courts</option>
                                    <option value="Electronic City" @if($icfsm->account == 'Electronic City') selected @endif>Electronic City</option>
                                    <option value="Erajaya" @if($icfsm->account == 'Erajaya') selected @endif>Erajaya</option>
                                    <option value="Giant" @if($icfsm->account == 'Giant') selected @endif>Giant</option>
                                    <option value="Hypermart" @if($icfsm->account == 'Hypermart') selected @endif>Hypermart</option>
                                    <option value="Lottemart" @if($icfsm->account == 'Lottemart') selected @endif>Lottemart</option>
                                    <option value="Traditional" @if($icfsm->account == 'Traditional') selected @endif>Traditional</option>
                                    <option value="White Brown" @if($icfsm->account == 'White Brown') selected @endif>White Brown</option>
                                    <option value="SES Store" @if($icfsm->account == 'SES Store') selected @endif>SES Store</option> 
                                </select>
                                @error('account')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_toko"  class="col-sm-3 col-form-label">Nama Toko</label>
                            <div class="col-sm">
                                <input type="text" value="{{$icfsm->nama_toko}}" class="form-control @error('nama_toko') is-invalid @enderror" name="nama_toko" id="nama_toko" placeholder="Nama Toko" value="{{ old('nama_toko') }}">
                                @error('nama_toko')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category"  class="col-sm-3 col-form-label">Category FSM</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('category') is-invalid @enderror" name="category" id="category">
                                    <option value="Direct" @if($icfsm->category == 'Direct') selected @endif>Direct</option>
                                    <option value="Indirect" @if($icfsm->category == 'Indirect') selected @endif>Indirect</option>
                                </select>
                                @error('category')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota"  class="col-sm-3 col-form-label">Kota</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('kota') is-invalid @enderror" name="kota" id="kota">
                                    <option value="Jabodetabek" @if($icfsm->kota == 'Jabodetabek') selected @endif>Jabodetabek</option>
                                    <option value="Kota Medan" @if($icfsm->kota == 'Kota Medan') selected @endif>Kota Medan</option>
                                    <option value="Kota Batam" @if($icfsm->kota == 'Kota Batam') selected @endif>Kota Batam</option>
                                    <option value="Kota Banda Aceh" @if($icfsm->kota == 'Kota Banda Aceh') selected @endif>Kota Banda Aceh</option>
                                    <option value="Kota Pekanbaru" @if($icfsm->kota == 'Kota Pekanbaru') selected @endif>Kota Pekanbaru</option>
                                    <option value="Kota Padang" @if($icfsm->kota == 'Kota Padang') selected @endif>Kota Padang</option>
                                    <option value="Kota Palembang" @if($icfsm->kota == 'Kota Palembang') selected @endif>Kota Palembang</option>
                                    <option value="Kota Jambi" @if($icfsm->kota == 'Kota Jambi') selected @endif>Kota Jambi</option>
                                    <option value="Kota Pangkal Pinang" @if($icfsm->kota == 'Kota Pangkal Pinang') selected @endif>Kota Pangkal Pinang</option>
                                    <option value="Kota Bengkulu" @if($icfsm->kota == 'Kota Bengkulu') selected @endif>Kota Bengkulu</option>
                                    <option value="Kota Samarinda" @if($icfsm->kota == 'Kota Samarinda') selected @endif>Kota Samarinda</option>
                                    <option value="Kota Balikpapan" @if($icfsm->kota == 'Kota Balikpapan') selected @endif>Kota Balikpapan</option>
                                    <option value="Kota Tarakan" @if($icfsm->kota == 'Kota Tarakan') selected @endif>Kota Tarakan</option>
                                    <option value="Kota Banjarmasin" @if($icfsm->kota == 'Kota Banjarmasin') selected @endif>Kota Banjarmasin</option>
                                    <option value="Kota Makassar" @if($icfsm->kota == 'Kota Makassar') selected @endif>Kota Makassar</option>
                                    <option value="Kota Ambon" @if($icfsm->kota == 'Kota Ambon') selected @endif>Kota Ambon</option>
                                    <option value="Kota Jayapura" @if($icfsm->kota == 'Kota Jayapura') selected @endif>Kota Jayapura</option>
                                    <option value="Kota Kendari" @if($icfsm->kota == 'Kota Kendari') selected @endif>Kota Kendari</option>
                                    <option value="Kota Manado" @if($icfsm->kota == 'Kota Manado') selected @endif>Kota Manado</option>
                                    <option value="Kota Palu" @if($icfsm->kota == 'Kota Palu') selected @endif>Kota Palu</option>
                                    <option value="Kota Luwuk" @if($icfsm->kota == 'Kota Luwuk') selected @endif>Kota Luwuk</option>
                                    <option value="Kota Gorontalo" @if($icfsm->kota == 'Kota Gorontalo') selected @endif>Kota Gorontalo</option>
                                    <option value="Kota Denpasar" @if($icfsm->kota == 'Kota Denpasar') selected @endif>Kota Denpasar</option>
                                    <option value="Kota Mataram" @if($icfsm->kota == 'Kota Mataram') selected @endif>Kota Mataram</option>
                                    <option value="Kota Kupang" @if($icfsm->kota == 'Kota Kupang') selected @endif>Kota Kupang</option>
                                    <option value="Kota Surabaya" @if($icfsm->kota == 'Kota Surabaya') selected @endif>Kota Surabaya</option>
                                    <option value="Kota Malang" @if($icfsm->kota == 'Kota Malang') selected @endif>Kota Malang</option>
                                    <option value="Kota Jember" @if($icfsm->kota == 'Kota Jember') selected @endif>Kota Jember</option>
                                    <option value="Kota Kediri" @if($icfsm->kota == 'Kota Kediri') selected @endif>Kota Kediri</option>
                                    <option value="Kota Semarang" @if($icfsm->kota == 'Kota Semarang') selected @endif>Kota Semarang</option>
                                    <option value="Kota Tegal" @if($icfsm->kota == 'Kota Tegal') selected @endif>Kota Tegal</option>
                                    <option value="Kota Yogyakarta" @if($icfsm->kota == 'Kota Yogyakarta') selected @endif>Kota Yogyakarta</option>
                                    <option value="Kota Solo" @if($icfsm->kota == 'Kota Solo') selected @endif>Kota Solo</option>
                                    <option value="Kota Purwokerto" @if($icfsm->kota == 'Kota Purwokerto') selected @endif>Kota Purwokerto</option>
                                    <option value="Kota Bandung" @if($icfsm->kota == 'Kota Bandung') selected @endif>Kota Bandung</option>
                                    <option value="Kota Cirebon" @if($icfsm->kota == 'Kota Cirebon') selected @endif>Kota Cirebon</option>
                                    <option value="Kota Garut" @if($icfsm->kota == 'Kota Garut') selected @endif>Kota Garut</option>
                                    <option value="Kota Tasikmalaya" @if($icfsm->kota == 'Kota Tasikmalaya') selected @endif>Kota Tasikmalaya</option>
                                    <option value="Kota Bandar Lampung" @if($icfsm->kota == 'Kota Bandar Lampung') selected @endif>Kota Bandar Lampung</option>
                                    <option value="Kota Pontianak" @if($icfsm->kota == 'Kota Pontianak') selected @endif>Kota Pontianak</option>
                                </select>
                                @error('kota')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="produk"  class="col-sm-3 col-form-label">Produk yang Diajarkan</label>
                            <div class="col-sm">
                                <input type="text" value="{{$icfsm->produk}}" class="form-control @error('produk') is-invalid @enderror" name="produk" id="produk" placeholder="Produk yang Diajarkan" value="{{ old('produk') }}">
                                @error('produk')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nilaipre"  class="col-sm-3 col-form-label">Nilai Pretest</label>
                            <div class="col-sm-2">
                                <input type="number" value="{{$icfsm->nilaipre}}" class="form-control @error('nilaipre') is-invalid @enderror" name="nilaipre" id="nilaipre" placeholder="Nilai Pretest" value="{{ old('nilaipre') }}">
                                @error('nilaipre')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nilaipost"  class="col-sm-3 col-form-label">Nilai Post Test</label>
                            <div class="col-sm-2">
                                <input type="number" value="{{$icfsm->nilaipost}}" class="form-control @error('nilaipost') is-invalid @enderror" name="nilaipost" id="nilaipost" placeholder="Nilai Post Test" value="{{ old('nilaipost') }}">
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


