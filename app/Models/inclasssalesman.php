<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inclasssalesman extends Model
{
    use HasFactory;
    protected $table = 'inclasssalesmens';
    protected $primaryKey = 'id_ics';
    protected $fillable = ['id_ics','tanggal','nama_employee','id_trainer','employee_id','produk','nilaipre','nilaipost'];
    public function trainer()
    {
        return $this->belongsTo('App\Models\trainer','id_trainer');
    }
}
