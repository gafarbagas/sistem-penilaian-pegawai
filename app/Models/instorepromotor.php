<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instorepromotor extends Model
{
    use HasFactory;
    protected $table = 'instorepromotors';
    protected $primaryKey = 'id_isp';
    protected $fillable = ['id_isp','tanggal','nama_employee','id_trainer','id_employee','instore','jenis','produk','tipe_produk','issue','gambar','jenis_ajar','nilai_selling1','nilai_selling2','nilai_selling3','nilai_selling4','nilai_selling5','nilai_selling6','nilai_selling7','nilai_selling8','nilai_selling9','nilai_selling10','nilai_produk1','nilai_produk2','nilai_produk3','nilai_produk4','nilai_produk5','nilai_knowledge1','nilai_knowledge2','nilai_knowledge3','nilai_knowledge4','nilai_knowledge5'];
    public function trainer()
    {
        return $this->belongsTo('App\Models\trainer','id_trainer');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\employee', 'id_employee');
    }
}
