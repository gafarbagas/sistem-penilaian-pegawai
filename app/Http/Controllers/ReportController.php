<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReportAdminExportMapping;
use App\Exports\ReportTrainerExportMapping;
use App\Models\trainer;
use Auth;

class ReportController extends Controller
{
    public function index()
    {
        $userLevel = Auth::user()->level;
        return view('pages.report.index', compact('userLevel'));
    }

    public function export_mapping(Request $request) {
        $userLevel = Auth::user()->level;
        $validator = Validator::make($request->all(), [
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
            'training' => 'required|max:255',
        ],[
            'tgl_awal.required' => 'Silahkan Pilih Tanggal Awal',
            'tgl_akhir.required' => 'Silahkan Pilih Tanggal Akhir',
            'training.required' => 'Silahkan Pilih Jenis Training',
        ]);
        if($userLevel == 'Admin'){
            if ($validator->fails()) {
                return redirect('/reportAdmin')
                    ->withErrors($validator)
                    ->withInput($request->input());
            }
        }elseif($userLevel == 'Trainer'){
            if ($validator->fails()) {
                return redirect('/reportTrainer')
                    ->withErrors($validator)
                    ->withInput($request->input());
            }
        }

        $start = $request->tgl_awal;
        $end = $request->tgl_akhir;
        $training = $request->training;
        $userID = Auth::user()->id;
        if($userLevel == 'Admin'){
            return Excel::download( new ReportAdminExportMapping($start,$end,$training), 'report-'.$training.'.xlsx') ;
        }elseif($userLevel == 'Trainer'){
            $trainer = trainer::where('user_id',$userID)->first();
            $trainerID = $trainer->id_trainer;
            return Excel::download( new ReportTrainerExportMapping($start,$end,$training,$trainerID), 'report-'.$training.'.xlsx') ;
        }
    }
}
