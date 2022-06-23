@extends('layouts.admin')

@section('title','Tambah In Class Promotor')
    
@section ('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <div class="d-sm-flex align-items-center mb-3 mt-4">
        <h1 class="h3 text-dark">Tambah In Class Promotor</h1>
    </div>

    <div class="row mb-5">
        <div class="col-sm text-dark">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tambahdataicp')}}" method="post">
                    @csrf
                        <div class="form-group row">
                            <label for="employee_id"  class="col-sm-3 col-form-label">Employee ID</label>
                            <div class="input-field col-sm">
                                <input type="text" class="autocomplete form-control @error('nama_employee') is-invalid @enderror" name="employee_id" id="employee_id" placeholder="Employee ID" value="{{ old('employee_id') }}">
                                @error('employee_id')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <input type="hidden" name="id_employee" id="id_employee" value="{{ old('id_employee') }}">

                        <div class="form-group row">
                            <label for="nama_employee"  class="col-sm-3 col-form-label">Nama Peserta Training</label>
                            <div class="col-sm">
                                <input readonly type="text" class="form-control @error('nama_employee') is-invalid @enderror" name="nama_employee" id="nama_employee" placeholder="Nama Peserta Training" value="{{ old('nama_employee') }}">
                                @error('nama_employee')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

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
                            <label for="trainer_id"  class="col-sm-3 col-form-label">Nama Trainer Training</label>
                            <div class="col-sm">
                                <input type="text" readonly value="{{ $trainer->nama_trainer }}" class="form-control @error('trainer_id') is-invalid @enderror" name="trainer_id" id="trainer_id" placeholder="Nama Trainer" value="{{ old('trainer_id') }}">
                            </div>
                        </div>

                        <input type="hidden" name="id_trainer" value="{{$trainer->id_trainer}}">

                        <div class="form-group row">
                            <label for="nilai1"  class="col-sm-3 col-form-label">Selling Skill (Feature 1)</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('nilai1') is-invalid @enderror" name="nilai1" id="nilai1">
                                    <option value="" disabled selected>Tambah Nilai Feature 1</option>
                                    <option value="60" @if(old('nilai1')=='60') selected @endif>60</option>
                                    <option value="70" @if(old('nilai1')=='70') selected @endif>70</option>
                                    <option value="80" @if(old('nilai1')=='80') selected @endif>80</option>
                                    <option value="90" @if(old('nilai1')=='90') selected @endif>90</option>
                                    <option value="100" @if(old('nilai1')=='100') selected @endif>100</option>
                                </select>
                                @error('nilai1')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nilai2"  class="col-sm-3 col-form-label">Selling Skill (Feature 2)</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('nilai2') is-invalid @enderror" name="nilai2" id="nilai2">
                                    <option value="" disabled selected>Tambah Nilai Feature 2</option>
                                    <option value="60" @if(old('nilai2')=='60') selected @endif>60</option>
                                    <option value="70" @if(old('nilai2')=='70') selected @endif>70</option>
                                    <option value="80" @if(old('nilai2')=='80') selected @endif>80</option>
                                    <option value="90" @if(old('nilai2')=='90') selected @endif>90</option>
                                    <option value="100" @if(old('nilai2')=='100') selected @endif>100</option>
                                </select>
                                @error('nilai2')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nilai3"  class="col-sm-3 col-form-label">Selling Skill (Feature 3)</label>
                            <div class="col-sm-4">
                                <select class="form-control @error('nilai3') is-invalid @enderror" name="nilai3" id="nilai3">
                                    <option value="" disabled selected>Tambah Nilai Feature 3</option>
                                    <option value="60" @if(old('nilai3')=='60') selected @endif>60</option>
                                    <option value="70" @if(old('nilai3')=='70') selected @endif>70</option>
                                    <option value="80" @if(old('nilai3')=='80') selected @endif>80</option>
                                    <option value="90" @if(old('nilai3')=='90') selected @endif>90</option>
                                    <option value="100" @if(old('nilai3')=='100') selected @endif>100</option>
                                </select>
                                @error('nilai3')
                                <div class="invalid-feedback"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="produk"  class="col-sm-3 col-form-label">Produk yang Diajarkan</label>
                            <div class="col-sm-4">
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
@section('script')
<script src="{{asset ('/admin/js/materialize.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $.ajax({
        type: 'get',
        url: '/training/ajax',
        success:function(response){
            var custArray = response;
            var dataCust = {};
            var dataCust2 = {};
            for (var i=0; i < custArray.length; i++){
                dataCust[custArray[i].employee_id]= null;
                dataCust2[custArray[i].employee_id]= custArray[i];
            }
            $('.autocomplete').autocomplete({
                data: dataCust,
                limit: 5,
                minLength: 2,
                onAutocomplete:function(reqdata){
                    $('#nama_employee').val(dataCust2[reqdata]['nama_employee']);
                    $('#id_employee').val(dataCust2[reqdata]['id_employee']);
                }
            });
        }
    })
});
</script>
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
                            $('select[name="jenis_ajar"]').append('<option value="">-</option>');
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

