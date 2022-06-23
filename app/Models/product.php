<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = ['id_product','nama_produk','id_category'];

    public function category()
    {
        return $this->belongsTo('App\Models\category', 'id_category');
    }
}
