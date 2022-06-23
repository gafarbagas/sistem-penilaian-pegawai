<?php

namespace App\Exports;

use App\Models\employee;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class employeeExport implements FromView, ShouldAutoSize
{
    private $employee;

    public function __construct($employee) {
           $this->employee = $employee;
    }
    use Exportable;
    public function view(): View
    {
        return view('pages.report.employeeexcel',[
            'employee' => $this->employee
        ]);
    }
}
