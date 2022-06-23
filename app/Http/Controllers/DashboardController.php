<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\inclasspromotor;
use App\Models\inclassfsm;
use App\Models\inclasssalesman;
use App\Models\inclasslain;
use App\Models\instorepromotor;
use App\Models\instorelain;
use App\Models\trainer;
use App\Models\employee;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $employee = employee::count();
        $trainer = trainer::count();
        $icp = inclasspromotor::count();
        $icfsm = inclassfsm::count();
        $ics = inclasssalesman::count();
        $icll = inclasslain::count();
        $isp = instorepromotor::count();
        $isll = instorelain::count();
        $bulan = Carbon::now()->format('m');
        $bulanFull = Carbon::now()->translatedFormat('F');
        $tahun = Carbon::now()->format('Y');

        // return $bulan;

        $a = DB::table('employees')
            ->rightJoin('inclasspromotors', 'employees.id_employee', '=', 'inclasspromotors.id_employee')
            ->where('employees.status_employee', '=', 'Aktif')
            ->select('inclasspromotors.id_employee')
            ->whereMonth('inclasspromotors.tanggal', $bulan)
            ->whereYear('inclasspromotors.tanggal', $tahun)
            ->groupBy('inclasspromotors.id_employee')
            ->get();

        $hasil = count($a);

        $b = DB::table('employees')
            ->where('employees.status_employee', '=', 'Aktif')
            ->whereNotIn('employees.id_employee', $a->pluck('id_employee')->toArray())
            ->count();

        $done = DB::table('employees')
            ->rightJoin('instorepromotors', 'employees.id_employee', '=', 'instorepromotors.id_employee')
            ->where('employees.status_employee', '=', 'Aktif')
            ->whereMonth('instorepromotors.tanggal', $bulan)
            ->whereYear('instorepromotors.tanggal', $tahun)
            ->select('instorepromotors.id_employee')
            ->groupBy('instorepromotors.id_employee')
            ->get();

        $hitung = count($done);
        
        
        $ongoing = DB::table('employees')
            ->where('employees.status_employee', '=', 'Aktif')
            ->whereNotIn('employees.id_employee', $done->pluck('id_employee')->toArray())
            ->count();
        
        $inclass1 = $hasil;
        $inclass2 = $b;
        $instore1 = $hitung;
        $instore2 = $ongoing;
        return view ('pages.dashboard.index',compact('employee','trainer','icp','icfsm','ics','icll','isp','isll','inclass1','inclass2','instore1','instore2','bulanFull'));
    }

    public function filterinclass($bulan)
    {
        $tahun = Carbon::now()->format('Y');

        $a = DB::table('employees')
            ->rightJoin('inclasspromotors', 'employees.id_employee', '=', 'inclasspromotors.id_employee')
            ->where('employees.status_employee', '=', 'Aktif')
            ->select('inclasspromotors.id_employee')
            ->whereMonth('inclasspromotors.tanggal', $bulan)
            ->whereYear('inclasspromotors.tanggal', $tahun)
            ->groupBy('inclasspromotors.id_employee')
            ->get();

        $hasil = count($a);

        $b = DB::table('employees')
            ->where('employees.status_employee', '=', 'Aktif')
            ->whereNotIn('employees.id_employee', $a->pluck('id_employee')->toArray())
            ->count();
        
        $inclass1 = $hasil;
        $inclass2 = $b;

        return response()->json([
            'inclass1' =>$inclass1,
            'inclass2' =>$inclass2
        ]);
    }

    public function filterinstore($bulan)
    {
        $tahun = Carbon::now()->format('Y');

        $done = DB::table('employees')
            ->rightJoin('instorepromotors', 'employees.id_employee', '=', 'instorepromotors.id_employee')
            ->where('employees.status_employee', '=', 'Aktif')
            ->whereMonth('instorepromotors.tanggal', $bulan)
            ->whereYear('instorepromotors.tanggal', $tahun)
            ->select('instorepromotors.id_employee')
            ->groupBy('instorepromotors.id_employee')
            ->get();

        $hitung = count($done);
        
        $ongoing = DB::table('employees')
            ->where('employees.status_employee', '=', 'Aktif')
            ->whereNotIn('employees.id_employee', $done->pluck('id_employee')->toArray())
            ->count();
        
        $instore1 = $hitung;
        $instore2 = $ongoing;

        return response()->json([
            'instore1' =>$instore1,
            'instore2' =>$instore2
        ]);
    }

    public function editpassword()
    {
        $user = Auth::user();
        $userLevel = Auth::user()->level;
        if($userLevel != 'Visitor'){
            return view ('pages.dashboard.editpassword', compact('user'));
        }else{
            return redirect('/visitor');
        }
    }

    public function updatepassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'newpassword' => 'required|max:255'
        ]);
        $user->update([
            'password' => Hash::make($request->newpassword),
        ]);
        if ($user->level == 'Admin'){
            return redirect('/')->with('success','Kata Sandi Berhasil Diubah');
        }elseif($user->level == 'Trainer'){
            return redirect('/training/isp')->with('success','Kata Sandi Berhasil Diubah');
        }
    }
}
