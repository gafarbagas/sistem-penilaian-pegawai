<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grup extends Model
{
    use HasFactory;

    protected $fillable = ['id_employee','id_trainer'];

    public function trainer()
    {
        return $this->belongsTo('App\Models\trainer','id_trainer');
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\employee', 'id_employee');
    }
}
