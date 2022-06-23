<?php

namespace App\Exports;

use App\Models\inclassfsm;
use App\Models\inclasslain;
use App\Models\inclasspromotor;
use App\Models\inclasssalesman;
use App\Models\instorelain;
use App\Models\instorepromotor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;

class ReportAdminExportMapping implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($start, $end, $training)
    {
        $this->start = $start;
        $this->end = $end;
        $this->training = $training;
    }

    public function view(): View
    {
        $start = Carbon::parse($this->start)->format('d/m/Y');
        $end = Carbon::parse($this->end)->format('d/m/Y');
        if($this->training == 'inclassfsm'){
            $icfsms = inclassfsm::with('trainer')->whereBetween('tanggal',[$this->start, $this->end])->get();
            return view('pages.report.icfsm-exports', compact('icfsms','start','end'));
        }
        elseif($this->training == 'inclasslain'){
            $iclls = inclasslain::with('trainer')->whereBetween('tanggal',[$this->start, $this->end])->get();
            return view('pages.report.icll-exports', compact('iclls','start','end'));
        }
        elseif($this->training == 'inclasspromotor'){
            $icps = inclasspromotor::with('trainer','employee')->whereBetween('tanggal',[$this->start, $this->end])->get();
            return view('pages.report.icp-exports', compact('icps','start','end'));
        }
        elseif($this->training == 'inclasssalesman'){
            $icss = inclasssalesman::with('trainer')->whereBetween('tanggal',[$this->start, $this->end])->get();
            return view('pages.report.ics-exports', compact('icss','start','end'));
        }
        elseif($this->training == 'instorepromotor'){
            $isps = instorepromotor::with('trainer','employee')->whereBetween('tanggal',[$this->start, $this->end])->get();
            return view('pages.report.isp-exports', compact('isps','start','end'));
        }
        else{
            $islls = instorelain::with('trainer')->whereBetween('tanggal',[$this->start, $this->end])->get();
            return view('pages.report.isll-exports', compact('islls','start','end'));
        }
    }
}
