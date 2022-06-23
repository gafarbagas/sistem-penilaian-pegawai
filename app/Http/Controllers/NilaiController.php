<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\trainer;

class NilaiController extends Controller
{
    public function index()
    {
        $employees = employee::all();
        // $userID = Auth::user()->id;
        // $trainer = trainer::where('user_id',$userID)->first();
        // $trainerID = $trainer->id_trainer;
        // $employees = employee::where('id_trainer',$trainerID)->get() ;
        return view('pages.nilai.index', compact('employees'));
    }

    public function edit($id)
    {
        // $userID = Auth::user()->id;
        // $trainer = trainer::where('user_id',$userID)->first();
        // $trainerID = $trainer->id_trainer;
        $employee = employee::find($id);
        // if($employee->id_trainer == $trainerID){
        //     return view('pages.nilai.edit', compact('employee'));
        // }else{
        //     return redirect('/nilai');
        // }

        return view('pages.nilai.edit', compact('employee'));

    }

    public function update(Request $request, $id)
    {
        $rules = [
            'grading' => 'required|max:255',
        ];
        
        $customMessage = [
            'grading.required' => 'Silakan isi Form Nilai'
        ];
        
        $this->validate($request, $rules, $customMessage);

        employee::where('id_employee',$id)->update([
            'grading' => $request->grading,
        ]);
        return redirect('/nilai')->with('success', 'Data Berhasil di Edit');
    }
}
