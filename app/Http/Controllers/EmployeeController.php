<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Imports\employeeImport;
use App\Exports\employeeExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function pegawaiimportexcel(Request $request)
    {
	// menangkap file excel
	$file = $request->file('file')->store('import');

	// import data
    $import = new employeeImport;
    $import->import($file);
    if($import->failures()->isNotEmpty()){
        return back()->withFailures($import->failures());
    }
    // dd($import->failures());


    return redirect('/employee')->with('success', 'Data Berhasil di Import');
    }
    public function pegawaiexportexcel()
    {
        $employee = employee::all();
        return Excel::download(new employeeExport($employee), 'Data Employee.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = employee::paginate(15);
        return view('pages.employee.index', [
            'employees' => $employees
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_site' => 'required|max:255',
            'nama_site' => 'required|max:255',
            'employee_id' => 'required|unique:employees',
            'nama_employee' => 'required|max:255',
            'grading' => 'required|max:255',
            'status' => 'required|max:255',
            'status_employee' => 'required|max:255',
        ],[
            'nama_employee.required' => 'Silahkan isi Form Nama Employee Tersebut',
            'employee_id.required' => 'Silahkan isi Form Employee ID Tersebut',
            'employee_id.unique' => 'Data Employee ID ini sudah ada',
            'id_site.required' => 'Silahkan isi Form Site ID Tersebut',
            'grading.required' => 'Silahkan Pilih grading Tersebut',
            'nama_site.required' => 'Silahkan isi Form Nama Employee Tersebut',
            'status.required' => 'Silahkan Pilih Status Tersebut',
            'status_employee.required' => 'Silahkan Pilih Status Employee Tersebut',
        ]);
        if ($validator->fails()) {
            return redirect('/employee/tambah')
                ->withErrors($validator)
                ->withInput($request->input());
        }
       //insert ke table user

        $employee = new employee;
        $employee->nama_employee = $request->nama_employee;
        $employee->grading = $request->grading;
        $employee->employee_id = $request->employee_id;
        $employee->nama_site = $request->nama_site;
        $employee->id_site = $request->id_site;
        $employee->status = $request->status;
        $employee->status_employee = $request->status_employee;
        $employee->save();
        return redirect('/employee')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $employee = DB::table('employees')->where('id_employee',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('pages/employee/edit',['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $rules = [
            'employee_id' => [
                'required',
                Rule::unique('employees')->ignore($id, 'id_employee'),
            ],
            'id_site' => 'required|max:255',
            'nama_employee' => 'required|max:255',
            'nama_site' => 'required|max:255',
            'grading' => 'required|max:255',
            'status' => 'required|max:255',
            'status_employee' => 'required|max:255',
        ];

        $customMessage = [
            'nama_employee.required' => 'Silahkan isi Form Nama Employee Tersebut',
            'employee_id.required' => 'Silahkan isi Form Employee ID Tersebut',
            'employee_id.unique' => 'Data Employee ID ini sudah ada',
            'id_site.required' => 'Silahkan isi Form Site ID Tersebut',
            'grading.required' => 'Silahkan Pilih grading Tersebut',
            'status.required' => 'Silahkan Pilih status Tersebut',
            'nama_site.required' => 'Silahkan isi Form Nama Site Tersebut',
            'status_employee.required' => 'Silahkan Pilih Status Employee Tersebut',
        ];
        $this->validate($request, $rules, $customMessage);

        employee::where('id_employee',$id)
        ->update([
            'id_site' => $request->id_site,
            'nama_site' => $request->nama_site,
            'nama_employee' => $request->nama_employee,
            'employee_id' => $request->employee_id,
            'grading' => $request->grading,
            'status' => $request->status,
            'status_employee' => $request->status_employee,
        ]);
        return redirect('/employee')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employee::find($id);
        $employee->delete();
        return redirect('/employee')->with('delete', 'Data Berhasil di Hapus');
    }
}
