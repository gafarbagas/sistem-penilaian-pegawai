<?php

namespace App\Imports;

use App\Models\employee;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsFailures;


class employeeImport implements ToModel, 
    WithValidation, 
    WithHeadingRow,
    SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new employee([
           'id_site'     => $row['id_site'],
           'nama_site'    => $row['nama_site'], 
           'employee_id' =>  $row['employee_id'], 
           'nama_employee' =>  $row['nama_employee'], 
           'grading' =>  $row['grading'],
           'status' =>  $row['status'],
           'status_employee' =>  $row['status_employee'],
        ]);
    }
    public function rules(): array
    {
        return [
             // Above is alias for as it always validates in batches
             '*.employee_id' => Rule::unique('employees', 'employee_id')
        ];
    }
}
