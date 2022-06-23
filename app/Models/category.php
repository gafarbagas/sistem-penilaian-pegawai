<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id_category';
    protected $fillable = ['id_category','nama_kategori'];

    public function product()
    {
        return $this->hasOne('App\Models\product', 'id_product');
    }
}
