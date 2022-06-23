<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inclasssalesman;
use App\Models\trainer;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Validator;

class InclasssalesmanController extends Controller
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
            $icss = inclasssalesman::paginate(15);
        }elseif ($user->level == 'Trainer'){
            $userID = Auth::user()->id;
            $trainer = trainer::where('user_id',$userID)->first();
            $icss = inclasssalesman::where('id_trainer',$trainer->id_trainer)->paginate(15);
        }
        return view('pages.training.ics.index',[
            'icss' => $icss,
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
        return view('pages.training.ics.create',compact('trainer'));
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
            'tanggal' => 'required|max:255',
            'employee_id' => 'required|max:255',
            'nama_employee' => 'required|max:255',
            'produk' => 'required|max:255',
            'nilaipre' => 'required|integer|max:100|min:0',
            'nilaipost' => 'required|integer|max:100|min:0',
        ],[
            'tanggal.required' => 'Silahkan isi Tanggal Aktifitas Training Tersebut',
            'employee_id.required' => 'Silahkan isi ID Employee Tersebut',
            'nama_employee.required' => 'Silahkan isi Form Nama Employee Tersebut',
            'produk.required' => 'Silahkan isi Form Produk yang diajarkan Tersebut',
            'nilaipre.required' => 'Silahkan isi Nilai Pretest',
            'nilaipre.max' => 'Nilai maximal 100',
            'nilaipre.min' => 'Nilai minimal 1',
            'nilaipost.required' => 'Silahkan isi Nilai Postest',
            'nilaipost.max' => 'Nilai maximal 100',
            'nilaipost.min' => 'Nilai minimal 1',
        ]);
        if ($validator->fails()) {
            return redirect('/training/ics/tambah')
                ->withErrors($validator)
                ->withInput($request->input());
        }

        $ics = new inclasssalesman;
        $ics->tanggal = $request->tanggal;
        $ics->employee_id = $request->employee_id;
        $ics->nama_employee = $request->nama_employee;
        $ics->id_trainer = $request->id_trainer;
        $ics->produk = $request->produk;
        $ics->nilaipre = $request->nilaipre;
        $ics->nilaipost = $request->nilaipost;
        $ics->save();
        return redirect('/training/ics')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inclasssalesman  $inclasssalesman
     * @return \Illuminate\Http\Response
     */
    public function show(inclasssalesman $inclasssalesman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inclasssalesman  $inclasssalesman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if ($user->level == 'Admin'){
            $trainer = trainer::all();
            $ics = inclasssalesman::find($id);
            return view('pages.training.ics.edit',[
                'ics' => $ics
            ]);
        }elseif ($user->level == 'Trainer') {
            $userID = Auth::user()->id;
            $trainer = trainer::where('user_id',$userID)->first();
            $ics = inclasssalesman::find($id);
            if($ics->id_trainer == $trainer->id_trainer){
                return view('pages.training.ics.edit',['ics' => $ics]);
            }else{
                return redirect('/training/ics')->with('error', 'Anda Tidak Memiliki Akses');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inclasssalesman  $inclasssalesman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'tanggal' => 'required|max:255',
            'produk' => 'required|max:255',
            'nilaipre' => 'required|integer|max:100|min:0',
            'nilaipost' => 'required|integer|max:100|min:0',
        ];

        $customMessage = [
            'tanggal.required' => 'Silahkan isi Tanggal Aktifitas Training Tersebut',
            'produk.required' => 'Silahkan isi Form Produk yang diajarkan Tersebut',
            'nilaipre.required' => 'Silahkan isi Nilai Pretest',
            'nilaipre.max' => 'Nilai maximal 100',
            'nilaipre.min' => 'Nilai minimal 1',
            'nilaipost.required' => 'Silahkan isi Nilai Postest',
            'nilaipost.max' => 'Nilai maximal 100',
            'nilaipost.min' => 'Nilai minimal 1',
        ];
        $this->validate($request, $rules, $customMessage);
        inclasssalesman::where('id_ics',$id)
        ->update([
            'tanggal' => $request->tanggal,
            'produk' => $request->produk,
            'nilaipre' => $request->nilaipre,
            'nilaipost' => $request->nilaipost,
        ]);
        return redirect('/training/ics')->with('success', 'Data Berhasil di Edit');
    }
    public function destroy($id)
    {
        $ics = inclasssalesman::find($id);
        $ics->delete();
        return redirect('/training/ics')->with('success', 'Data Berhasil di Hapus');
    }
}
