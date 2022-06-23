<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use App\Models\inclasspromotor;
use App\Models\instorepromotor;
use App\Models\grup;

class VisitorController extends Controller
{
    public function index()
    {
        return view ('pages.visitor.index');
    }

    public function ambildata(Request $request){
        $cek = employee::where('employee_id',$request->employee_id)->count();
        
        if($cek === 1){
            $employee = employee::with('icp','isp')->where('employee_id',$request->employee_id)->first();
            $icp = inclasspromotor::where('id_employee',$employee->id_employee)->latest('id_icp')->first();
            $isp = instorepromotor::where('id_employee',$employee->id_employee)->latest('id_isp')->first();
            return view('pages.visitor.ambildata', compact('employee','icp','isp'));
        }
        else{
            return response()->json([
                'success' => false,
            ]);
        };
    }
}