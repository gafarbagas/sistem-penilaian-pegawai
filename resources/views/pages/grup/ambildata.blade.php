<div class="mb-3 mt-4">
    <p><b>Detail Employee</b></p>
</div>

<div class="row mb-3">
    <label class="col-sm-2">Employee ID</label>
    <div class="col-sm-8">{{ $ambildata->employee_id }}</div>
</div>

<div class="row mt-3 mb-3">
    <label class="col-sm-2">PC Name</label>
    <div class="col-sm-8">{{ $ambildata->nama_employee }}</div>
</div>

<div class="row mb-3">
    <label class="col-sm-2">Site Name</label>
    <div class="col-sm-8">{{ $ambildata->nama_site }}</div>
</div>

<input type="hidden" name="id_employee" value="{{$ambildata->id_employee}}">

