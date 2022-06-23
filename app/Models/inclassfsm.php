<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inclassfsm extends Model
{
    use HasFactory;
    protected $table = 'inclassfsms';
    protected $primaryKey = 'id_icf';
    protected $fillable = ['id_icf','tanggal','nama_employee','id_trainer','email','nohp','status','jabatan','account','nama_toko','category','kota','produk','nilaipre','nilaipost'];
    public function trainer()
    {
        return $this->belongsTo('App\Models\trainer','id_trainer');
    }
}
