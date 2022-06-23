<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trainer extends Model
{
    use HasFactory;
    protected $table = 'trainers';
    protected $primaryKey = 'id_trainer';
    protected $fillable = ['id_trainer','user_id','nama_trainer','trainer_area','trainer_id'];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function grup()
    {
        return $this->hasMany('App\Models\grup');
    }

    public function icp()
    {
        return $this->hasMany('App\Models\inclasspromotor');
    }
    public function icfsm()
    {
        return $this->hasMany('App\Models\inclassfsm');
    }
    public function ics()
    {
        return $this->hasMany('App\Models\inclasssalesman');
    }
    public function icl()
    {
        return $this->hasMany('App\Models\inclasslain');
    }
    public function isp()
    {
        return $this->hasMany('App\Models\insotrepromotor');
    }
    public function isll()
    {
        return $this->hasMany('App\Models\instorelain');
    }
}
