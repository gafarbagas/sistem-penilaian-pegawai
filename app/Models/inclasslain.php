<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inclasslain extends Model
{
    use HasFactory;
    protected $table = 'inclasslains';
    protected $primaryKey = 'id_icl';
    protected $fillable = ['id_icl','tanggal','nama_employee','trainer_id','nilai1','nilai2','nilai3','employee_id','produk','nilaipre','nilaipost'];
    public function trainer()
    {
        return $this->belongsTo('App\Models\trainer','id_trainer');
    }
}
