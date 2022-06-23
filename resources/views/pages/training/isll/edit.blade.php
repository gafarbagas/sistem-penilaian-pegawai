@extends('layouts.admin')

@section('title','Edit In Store Lain-Lain')

@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Edit In Store Lain-Lain</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    <form action="/training/isll/update/{{$isll->id_isl}}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="tanggal"  class="col-sm-3 col-form-label">Tanggal Aktifitas Training</label>
                            <div class="col-sm-3">
                                <input type="date" value="{{$isll->tanggal}}" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal" placeholder="Tanggal Aktifitas Training" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="employee_id"  class="col-sm-3 col-form-label">ID Employee</label>
                            <div class="col-sm">
                                <input type="text" value="{{$isll->employee_id}}" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" id="employee_id" placeholder="ID Employee" value="{{ old('employee_id') }}">
                                @error('employee_id')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_employee"  class="col-sm-3 col-form-label">Nama Peserta Training</label>
                            <div class="col-sm">
                                <input type="text" readonly value="{{$isll->nama_employee}}" class="form-control @error('nama_employee') is-invalid @enderror" name="nama_employee" id="nama_employee" placeholder="Nama Peserta Training" value="{{ old('nama_employee') }}">
                                @error('nama_employee')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="trainer_id"  class="col-sm-3 col-form-label">Nama Trainer Training</label>
                            <div class="col-sm">
                                <input type="text" readonly value="{{$isll->trainer->nama_trainer}}" class="form-control @error('trainer_id') is-invalid @enderror" name="trainer_id" id="trainer_id" placeholder="Nama Trainer Training" value="{{ old('trainer_id') }}">
                                @error('trainer_id')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="instore"  class="col-sm-3 col-form-label">Instore Ke</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('instore') is-invalid @enderror" name="instore" id="instore">
                                    <option value="" disabled selected>Pilih Instore Ke</option>
                                    <option value="1" @if($isll->instore == '1') selected @endif>1</option>
                                    <option value="2" @if($isll->instore == '2') selected @endif>2</option>
                                    <option value="3" @if($isll->instore == '3') selected @endif>3</option>
                                    <option value="4" @if($isll->instore == '4') selected @endif>4</option>
                                    <option value="5" @if($isll->instore == '5') selected @endif>5</option>
                                </select>
                                @error('instore')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis"  class="col-sm-3 col-form-label">Jenis Instore</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                                    <option value="" disabled selected>Pilih Jenis Instore</option>
                                    <option value="OFFLINE" @if($isll->jenis == 'OFFLINE') selected @endif>OFFLINE</option>
                                    <option value="ONLINE" @if($isll->jenis == 'ONLINE') selected @endif>ONLINE</option>
                                </select>
                                @error('jenis')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="produk"  class="col-sm-3 col-form-label">Produk yang Diajarkan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="produk" value="{{ $isll->produk }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jenis_ajar"  class="col-sm-3 col-form-label">Jenis Produk</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="jenis_ajar" value="{{ $isll->jenis_ajar }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipe_produk"  class="col-sm-3 col-form-label">Tipe Produk</label>
                            <div class="col-sm">
                                <input type="text" value="{{$isll->tipe_produk}}" class="form-control @error('tipe_produk') is-invalid @enderror" name="tipe_produk" id="tipe_produk" placeholder="Tipe Produk" value="{{ old('tipe_produk') }}">
                                @error('tipe_produk')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="issue"  class="col-sm-3 col-form-label">Issue</label>
                            <div class="col-sm">
                                <textarea class="form-control @error('issue') is-invalid @enderror" name="issue" id="issue" cols="30" rows="4" value="{{ old('issue') }}">{{$isll->issue}}</textarea>
                                @error('issue')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gambar"  class="col-sm-3 col-form-label">Gambar</label>
                            <div class="col-sm">
                                <div class="row mb-3">
                                    <div class="col-sm">
                                        <img src="/admin/img/gambar_aktivitas/{{$isll->gambar}}" width="300px">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="file" accept="image/*" class="form-control-file @error('gambar') is-invalid @enderror" name="gambar" id="gambar">
                                        @error('gambar')
                                            <div class="invalid-feedback"> {{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm col-form-label"><b>Selling Skill In Store Soal</b></label>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_selling1" >1. Peka terhadap kehadiran shopper dan melakukan greetings / salam ?</label>
                                <select class="form-control @error('nilai_selling1') is-invalid @enderror" name="nilai_selling1" id="nilai_selling1">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_selling1 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_selling1 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_selling1')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_selling2" >2. Make up dan kelengkapannya sesuai dengan SOP Grooming  ?</label>
                                <select class="form-control @error('nilai_selling2') is-invalid @enderror" name="nilai_selling2" id="nilai_selling2">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_selling2 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_selling2 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_selling2')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_selling3" >3. Mempunyai sikap yang baik, sopan, luwes, ramah, percaya diri, dan pintar dalam menjelaskan produk knowledge secara konsisten ?</label>
                                <select class="form-control @error('nilai_selling3') is-invalid @enderror" name="nilai_selling3" id="nilai_selling3">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_selling3 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_selling3 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_selling3')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_selling4" >4. Mengetahui karakter shopper dan mampu berkomunikasi dengan tepat ?</label>
                                <select class="form-control @error('nilai_selling4') is-invalid @enderror" name="nilai_selling4" id="nilai_selling4">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_selling4 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_selling4 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_selling4')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_selling5" >5. Menanyakan pertanyaan terbuka untuk menggali kebutuhan konsumen ?</label>
                                <select class="form-control @error('nilai_selling5') is-invalid @enderror" name="nilai_selling5" id="nilai_selling5">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_selling5 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_selling5 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_selling5')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_selling6" >6. Menjelaskan benefit 3 USP sesuai informasi yang didapatkan dari konsumen ?</label>
                                <select class="form-control @error('nilai_selling6') is-invalid @enderror" name="nilai_selling6" id="nilai_selling6">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_selling6 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_selling6 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_selling6')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_selling7" >7. Merekomendasikan produk dengan tepat sesuai dengan shopper profile  ?</label>
                                <select class="form-control @error('nilai_selling7') is-invalid @enderror" name="nilai_selling7" id="nilai_selling7">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_selling7 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_selling7 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_selling7')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_selling8" >8. Mengetahui keunggulan produk kompetitor terdekat terutama head to head dan bisa menawarkan produk samsung dengan benefit yang tepat ?</label>
                                <select class="form-control @error('nilai_selling8') is-invalid @enderror" name="nilai_selling8" id="nilai_selling8">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_selling8 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_selling8 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_selling8')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_selling9" >9. Merekomendasikan produk samsung yang lebih "tinggi" kepada konsumen (Up Selling) ?</label>
                                <select class="form-control @error('nilai_selling9') is-invalid @enderror" name="nilai_selling9" id="nilai_selling9">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_selling9 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_selling9 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_selling9')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_selling10" >10. Merekomendasikan produk samsung yang lain kepada konsumen (Cross Selling) ?</label>
                                <select class="form-control @error('nilai_selling10') is-invalid @enderror" name="nilai_selling10" id="nilai_selling10">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_selling10 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_selling10 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_selling10')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm col-form-label"><b>Product Knowledge In Store Soal</b></label>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_produk1" >1. Mengkomunikasikan 3 featur utama dengan benefit ?</label>
                                <select class="form-control @error('nilai_produk1') is-invalid @enderror" name="nilai_produk1" id="nilai_produk1">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_produk1 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_produk1 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_produk1')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_produk2" >2. Mampu mendemokan POP, Display dan sarana promo yang lain dengan Ya ?</label>
                                <select class="form-control @error('nilai_produk2') is-invalid @enderror" name="nilai_produk2" id="nilai_produk2">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_produk2 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_produk2 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_produk2')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_produk3" >3. Mengetahui produk kompetitor terdekat di toko ?</label>
                                <select class="form-control @error('nilai_produk3') is-invalid @enderror" name="nilai_produk3" id="nilai_produk3">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_produk3 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_produk3 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_produk3')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_produk4" >4. Mampu menangani keluhan konsumen dengan tepat ?</label>
                                <select class="form-control @error('nilai_produk4') is-invalid @enderror" name="nilai_produk4" id="nilai_produk4">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_produk4 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_produk4 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_produk4')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_produk5" >5. Mengkomunikasikan produk focus di bulan tersebut ?</label>
                                <select class="form-control @error('nilai_produk5') is-invalid @enderror" name="nilai_produk5" id="nilai_produk5">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_produk5 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_produk5 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_produk5')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm col-form-label"><b>Market Knowledge In Store Soal</b></label>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_knowledge1" >1. Mengetahui target dan pencapaian di minggu tersebut ?</label>
                                <select class="form-control @error('nilai_knowledge1') is-invalid @enderror" name="nilai_knowledge1" id="nilai_knowledge1">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_knowledge1 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_knowledge1 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_knowledge1')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_knowledge2" >2. Mencatat dan melengkapi sales fundamental di smart folder  ?</label>
                                <select class="form-control @error('nilai_knowledge2') is-invalid @enderror" name="nilai_knowledge2" id="nilai_knowledge2">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_knowledge2 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_knowledge2 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_knowledge2')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_knowledge3" >3. Mengetahui promo yang sedang berlaku  ?</label>
                                <select class="form-control @error('nilai_knowledge3') is-invalid @enderror" name="nilai_knowledge3" id="nilai_knowledge3">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_knowledge3 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_knowledge3 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_knowledge3')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_knowledge4" >4. Mengetahui promo produk kompetitor  ?</label>
                                <select class="form-control @error('nilai_knowledge4') is-invalid @enderror" name="nilai_knowledge4" id="nilai_knowledge4">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_knowledge4 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_knowledge4 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_knowledge4')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_knowledge5" >5. Merawat dan menjaga kebersihan POP Display dan sarana promo di toko  ?</label>
                                <select class="form-control @error('nilai_knowledge5') is-invalid @enderror" name="nilai_knowledge5" id="nilai_knowledge5">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100" @if($isll->nilai_knowledge5 == '100') selected @endif>Ya</option>
                                    <option value="0"  @if($isll->nilai_knowledge5 == '0') selected @endif>Tidak</option>
                                </select>
                                @error('nilai_knowledge5')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

