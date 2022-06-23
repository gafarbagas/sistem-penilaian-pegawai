@extends('layouts.admin')

@section('title','Tambah In Class Store Lain-Lain')
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Tambah In Class Store Lain-Lain</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tambahdataisll')}}" method="POST" enctype="multipart/form-data">
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
                            <label for="employee_id"  class="col-sm-3 col-form-label">ID Employee</label>
                            <div class="col-sm">
                                <input type="text" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" id="employee_id" placeholder="ID Employee" value="{{ old('employee_id') }}">
                                @error('employee_id')
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
                            <label for="trainer_id"  class="col-sm-3 col-form-label">Nama Trainer Training</label>
                            <div class="col-sm">
                                <input type="text" readonly value="{{ $trainer->nama_trainer }}" class="form-control @error('trainer_id') is-invalid @enderror" id="trainer_id" placeholder="Nama Trainer" value="{{ old('trainer_id') }}">
                            </div>
                        </div>

                        <input type="hidden" name="id_trainer" value="{{$trainer->id_trainer}}">

                        <div class="form-group row">
                            <label for="instore"  class="col-sm-3 col-form-label">Instore Ke</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('instore') is-invalid @enderror" name="instore" id="instore" value="{{ old('instore') }}">
                                    <option value="" disabled selected>Pilih Instore Ke</option>
                                    <option value="1" @if(old('instore')=='1' ) selected @endif>1</option>
                                    <option value="2" @if(old('instore')=='2' ) selected @endif>2</option>
                                    <option value="3" @if(old('instore')=='3' ) selected @endif>3</option>
                                    <option value="4" @if(old('instore')=='4' ) selected @endif>4</option>
                                    <option value="5" @if(old('instore')=='5' ) selected @endif>5</option>
                                </select>
                                @error('instore')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis"  class="col-sm-3 col-form-label">Jenis Instore</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('jenis') is-invalid @enderror" name="jenis" id="jenis" value="{{ old('jenis') }}">
                                    <option value="" disabled selected>Pilih Jenis Instore</option>
                                    <option value="OFFLINE" @if(old('jenis')=='OFFLINE') selected @endif>OFFLINE</option>
                                    <option value="ONLINE" @if(old('jenis')=='ONLINE') selected @endif>ONLINE</option>
                                </select>
                                @error('jenis')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="produk"  class="col-sm-3 col-form-label">Produk yang Diajarkan</label>
                            <div class="col-sm-4">
                                <select type="text" class="form-control @error('produk') is-invalid @enderror" id="produk" name="produk">
                                    <option selected disabled>- Pilih -</option>
                                    @foreach ($categories as $value)
                                    <option value="{{ $value->nama_kategori }} ">{{ $value->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('produk')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_ajar"  class="col-sm-3 col-form-label">Jenis Produk</label>
                            <div class="col-sm-4">
                                <select type="text" class="form-control @error('jenis_ajar') is-invalid @enderror" id="jenis_ajar" name="jenis_ajar">
                                    <option selected disabled>- Pilih -</option>
                                </select>
                                @error('jenis_ajar')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tipe_produk"  class="col-sm-3 col-form-label">Tipe Produk</label>
                            <div class="col-sm-8">
                                <input type="text"  class="form-control @error('tipe_produk') is-invalid @enderror" name="tipe_produk" id="tipe_produk" placeholder="Tipe Produk" value="{{ old('tipe_produk') }}">
                                @error('tipe_produk')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="issue"  class="col-sm-3 col-form-label">Issue</label>
                            <div class="col-sm-8">
                                <textarea class="form-control @error('issue') is-invalid @enderror" name="issue" id="issue" cols="30" rows="4">{{ old('issue') }}</textarea>
                                @error('issue')
                                        <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gambar"  class="col-sm-3 col-form-label">Tambah Gambar (Maksimal 5MB)</label>
                            <div class="col-sm-3">
                                <input class="form-control-file @error('gambar') is-invalid @enderror" name="gambar" accept=".jpg" type="file" id="gambar" name="gambar">
                                @error('gambar')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label class="col-sm col-form-label"><b>Selling Skill In Store Soal</b></label>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_selling1" >1. Peka terhadap kehadiran shopper dan melakukan greetings / salam ?</label>
                                <select class="form-control @error('nilai_selling1') is-invalid @enderror" name="nilai_selling1" id="nilai_selling1">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                                @error('nilai_selling10')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label class="col-sm col-form-label"><b>Product Knowledge In Store Soal</b></label>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_produk1" >1. Mengkomunikasikan 3 featur utama dengan benefit ?</label>
                                <select class="form-control @error('nilai_produk1') is-invalid @enderror" name="nilai_produk1" id="nilai_produk1">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                                @error('nilai_produk1')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_produk2" >2. Mampu mendemokan POP, Display dan sarana promo yang lain dengan benar ?</label>
                                <select class="form-control @error('nilai_produk2') is-invalid @enderror" name="nilai_produk2" id="nilai_produk2">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                                @error('nilai_produk5')
                                    <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr>
                        
                        <div class="form-group row">
                            <label class="col-sm col-form-label"><b>Market Knowledge In Store Soal</b></label>
                        </div>

                        <div class="form-group d-flex justify-content-center">
                            <div class="col-sm-8">
                                <label for="nilai_knowledge1" >1. Mengetahui target dan pencapaian di minggu tersebut ?</label>
                                <select class="form-control @error('nilai_knowledge1') is-invalid @enderror" name="nilai_knowledge1" id="nilai_knowledge1">
                                    <option value="" disabled selected>Pilih Jawaban</option>
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
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
                                    <option value="100">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                                @error('nilai_knowledge5')
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

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="produk"]').on('change', function() {
            var produk = $(this).val();
            if(produk) {
                $.ajax({
                    url: '/training/ajax/'+produk,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        if(data.success == false){
                            $('select[name="jenis_ajar"]').empty();
                            $('select[name="jenis_ajar"]').append('<option value="-">-</option>');
                        }else{
                            $('select[name="jenis_ajar"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="jenis_ajar"]').append('<option value="'+ value +'">'+ value +'</option>');
                            });
                        }
                    }
                });
            }else{
                $('select[name="jenis_ajar"]').empty();
            }
        });
    });
</script>
@endsection


