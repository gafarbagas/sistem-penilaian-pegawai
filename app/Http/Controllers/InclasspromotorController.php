<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\employee;
use App\Models\inclasspromotor;
use App\Models\grup;
use App\Models\trainer;
use Auth;

class inclasspromotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->level == 'Admin'){
            $trainer = trainer::paginate(15);
            $icps = inclasspromotor::paginate(15);
        }elseif ($user->level == 'Trainer'){
            $userID = Auth::user()->id;
            $trainer = trainer::where('user_id',$userID)->first();
            $icps = inclasspromotor::where('id_trainer',$trainer->id_trainer)->paginate(15);
        }
        return view('pages.training.icp.index',[
            'icps' => $icps,
            'trainer' => $trainer,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userID = Auth::user()->id;
        $trainer = trainer::where('user_id',$userID)->first();
        return view('pages.training.icp.create',compact('trainer'));
    }

    // public function ajax()
    // {
    //     $p = employee::where('status_employee','=', 'Aktif')->get();
    //     return response()->json($p);
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required|max:255',
            'nama_employee' => 'required|max:255',
            'tanggal' => 'required|max:255',
            'nilai1' => 'required|max:255',
            'nilai2' => 'required|max:255',
            'nilai3' => 'required|max:255',
            'produk' => 'required|max:255',
            'nilaipre' => 'required|integer|max:100|min:0',
            'nilaipost' => 'required|integer|max:100|min:0',
        ],[
            'employee_id.required' => 'Silahkan isi ID Employee Tersebut',
            'nama_employee.required' => 'Silahkan isi Form Nama Employee Tersebut',
            'tanggal.required' => 'Silahkan isi Tanggal Aktifitas Training Tersebut',
            'nilai1.required' => 'Silahkan Pilih Nilai Feature Tersebut',
            'nilai2.required' => 'Silahkan Pilih Nilai Feature Tersebut',
            'nilai3.required' => 'Silahkan Pilih Nilai Feature Tersebut',
            'produk.required' => 'Silahkan isi Form Produk yang diajarkan Tersebut',
            'nilaipre.required' => 'Silahkan isi Nilai Pretest',
            'nilaipre.max' => 'Nilai maximal 100',
            'nilaipre.min' => 'Nilai minimal 1',
            'nilaipost.required' => 'Silahkan isi Nilai Postest',
            'nilaipost.max' => 'Nilai maximal 100',
            'nilaipost.min' => 'Nilai minimal 1',
        ]);
        if ($validator->fails()) {
            return redirect('/training/icp/tambah')
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $icp = new inclasspromotor;
        $icp->tanggal = $request->tanggal;
        $icp->id_trainer = $request->id_trainer;
        $icp->id_employee = $request->id_employee;
        $icp->nilai1 = $request->nilai1;
        $icp->nilai2 = $request->nilai2;
        $icp->nilai3 = $request->nilai3;
        $icp->produk = $request->produk;
        $icp->nilaipre = $request->nilaipre;
        $icp->nilaipost = $request->nilaipost;
        $icp->save();
        return redirect('/training/icp')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\icp  $icp
     * @return \Illuminate\Http\Response
     */
    public function show(inclasspromotor $inclasspromotor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\icp  $icp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if ($user->level == 'Admin'){
            $trainer = trainer::all();
            $icp = inclasspromotor::find($id);
            return view('pages.training.icp.edit',[
                'icp' => $icp
            ]);
        }elseif ($user->level == 'Trainer') {
            $userID = Auth::user()->id;
            $trainer = trainer::where('user_id',$userID)->first();
            $icp = inclasspromotor::find($id);
            if($icp->id_trainer == $trainer->id_trainer){
                return view('pages.training.icp.edit',['icp' => $icp]);
            }else{
                return redirect('/training/icp')->with('error', 'Anda Tidak Memiliki Akses');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\icp  $icp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules = [
            'tanggal' => 'required|max:255',
            'nilai1' => 'required|max:255',
            'nilai2' => 'required|max:255',
            'nilai3' => 'required|max:255',
            'produk' => 'required|max:255',
            'nilaipre' => 'required|integer|max:100|min:0',
            'nilaipost' => 'required|integer|max:100|min:0',
        ];

        $customMessage = [
            'tanggal.required' => 'Silahkan isi Tanggal Aktifitas Training Tersebut',
            'nilai1.required' => 'Silahkan Pilih Nilai Feature Tersebut',
            'nilai2.required' => 'Silahkan Pilih Nilai Feature Tersebut',
            'nilai3.required' => 'Silahkan Pilih Nilai Feature Tersebut',
            'produk.required' => 'Silahkan isi Form Produk yang diajarkan Tersebut',
            'nilaipre.required' => 'Silahkan isi Nilai Pretest',
            'nilaipre.max' => 'Nilai maximal 100',
            'nilaipre.min' => 'Nilai minimal 1',
            'nilaipost.required' => 'Silahkan isi Nilai Postest',
            'nilaipost.max' => 'Nilai maximal 100',
            'nilaipost.min' => 'Nilai minimal 1',
        ];
        $this->validate($request, $rules, $customMessage);

        inclasspromotor::where('id_icp',$id)
        ->update([
            'tanggal' => $request->tanggal,
            'nilai1' => $request->nilai1,
            'nilai2' => $request->nilai2,
            'nilai3' => $request->nilai3,
            'produk' => $request->produk,
            'nilaipre' => $request->nilaipre,
            'nilaipost' => $request->nilaipost,
        ]);
        return redirect('/training/icp')->with('success', 'Data Berhasil di Edit');
    }
    public function destroy($id)
    {
        $icp = inclasspromotor::find($id);
        $icp->delete();
        return redirect('/training/icp')->with('success', 'Data Berhasil di Hapus');
    }
}
