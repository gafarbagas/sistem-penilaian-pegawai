<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inclasspromotor extends Model
{
    use HasFactory;
    protected $table = 'inclasspromotors';
    protected $primaryKey = 'id_icp';
    protected $fillable = ['id_icp','tanggal','id_trainer','id_employee','nilai1','nilai2','nilai3','produk','nilaipre','nilaipost'];

    public function trainer()
    {
        return $this->belongsTo('App\Models\trainer','id_trainer');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\employee', 'id_employee');
    }
}
