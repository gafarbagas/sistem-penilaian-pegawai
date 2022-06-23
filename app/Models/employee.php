<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'id_employee';
    protected $fillable = ['id_employee','id_site','employee_id','nama_employee','grading','nama_site','status','status_employee'];

    public function grup()
    {
        return $this->hasOne('App\Models\grup');
    }

    public function icp()
    {
        return $this->hasOne('App\Models\inclasspromotor', 'id_employee');
    }

    public function isp()
    {
        return $this->hasOne('App\Models\instorepromotor', 'id_employee');
    }
}
