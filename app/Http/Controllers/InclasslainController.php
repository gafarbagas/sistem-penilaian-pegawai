<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inclasslain;
use App\Models\trainer;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class InclasslainController extends Controller
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
            $iclls = inclasslain::paginate(15);
        }elseif ($user->level == 'Trainer'){
            $userID = Auth::user()->id;
            $trainer = trainer::where('user_id',$userID)->first();
            $iclls = inclasslain::where('id_trainer',$trainer->id_trainer)->paginate(15);
        }
        return view('pages.training.icll.index',[
            'iclls' => $iclls,
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
        return view('pages.training.icll.create',compact('trainer'));
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
            return redirect('/training/icll/tambah')
                ->withErrors($validator)
                ->withInput($request->input());
        }
       //insert ke table user

        $icll = new inclasslain;
        $icll->tanggal = $request->tanggal;
        $icll->nama_employee = $request->nama_employee;
        $icll->id_trainer = $request->id_trainer;
        $icll->employee_id = $request->employee_id;
        $icll->nilai1 = $request->nilai1;
        $icll->nilai2 = $request->nilai2;
        $icll->nilai3 = $request->nilai3;
        $icll->produk = $request->produk;
        $icll->nilaipre = $request->nilaipre;
        $icll->nilaipost = $request->nilaipost;
        $icll->save();
        return redirect('/training/icll')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inclasslain  $inclasslain
     * @return \Illuminate\Http\Response
     */
    public function show(inclasslain $inclasslain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inclasslain  $inclasslain
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if ($user->level == 'Admin'){
            $trainer = trainer::all();
            $icll = inclasslain::find($id);
            return view('pages.training.icll.edit',[
                'icll' => $icll
            ]);
        }elseif ($user->level == 'Trainer') {
            $userID = Auth::user()->id;
            $trainer = trainer::where('user_id',$userID)->first();
            $icll = inclasslain::find($id);
            if($icll->id_trainer == $trainer->id_trainer){
                return view('pages.training.icll.edit',['icll' => $icll]);
            }else{
                return redirect('/training/icll')->with('error', 'Anda Tidak Memiliki Akses');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inclasslain  $inclasslain
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

        inclasslain::where('id_icl',$id)
        ->update([
            'tanggal' => $request->tanggal,
            'nilai1' => $request->nilai1,
            'nilai2' => $request->nilai2,
            'nilai3' => $request->nilai3,
            'produk' => $request->produk,
            'nilaipre' => $request->nilaipre,
            'nilaipost' => $request->nilaipost,
        ]);
        return redirect('/training/icll')->with('success', 'Data Berhasil di Edit');
    }
    public function destroy($id)
    {
        $icll = inclasslain::find($id);
        $icll->delete();
        return redirect('/training/icll')->with('success', 'Data Berhasil di Hapus');
    }
}
