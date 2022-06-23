<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\inclassfsm;
use App\Models\trainer;
use App\Models\employee;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Validator;

class InclassfsmController extends Controller
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
            $icfsms = inclassfsm::paginate(15);
        }elseif ($user->level == 'Trainer'){
            $userID = Auth::user()->id;
            $trainer = trainer::where('user_id',$userID)->first();
            $icfsms = inclassfsm::where('id_trainer',$trainer->id_trainer)->paginate(15);
        }
        return view('pages.training.icfsm.index',[
            'icfsms' => $icfsms,
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
        return view('pages.training.icfsm.create',compact('trainer'));
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
            'nama_employee' => 'required|max:255',
            'email' => 'required|max:255',
            'nohp' => 'required|max:255',
            'status' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'account' => 'required|max:255',
            'nama_toko' => 'required|max:255',
            'category' => 'required|max:255',
            'kota' => 'required|max:255',
            'produk' => 'required|max:255',
            'nilaipre' => 'required|integer|max:100|min:0',
            'nilaipost' => 'required|integer|max:100|min:0',
        ],[
            'tanggal.required' => 'Silahkan isi Tanggal Aktifitas Training Tersebut',
            'nama_employee.required' => 'Silahkan isi Form Nama Employee Tersebut',
            'email.required' => 'Silahkan Isi Form Email Tersebut',
            'nohp.required' => 'Silahkan Isi Form No Handphone Tersebut',
            'status.required' => 'Silahkan Pilih Status FSM',
            'jabatan.required' => 'Silahkan Pilih Jabatan FSM',
            'account.required' => 'Silahkan Pilih Account Group',
            'nama_toko.required' => 'Silahkan Isi Form Nama Toko Tersebut',
            'category.required' => 'Silahkan Isi Form Category Tersebut',
            'kota.required' => 'Silahkan Pilih Kota',
            'produk.required' => 'Silahkan isi Form Produk yang diajarkan Tersebut',
            'nilaipre.required' => 'Silahkan Nilai Pretest',
            'nilaipre.max' => 'Nilai maximal 100',
            'nilaipre.min' => 'Nilai minimal 1',
            'nilaipost.required' => 'Silahkan isi Nilai Postest',
            'nilaipost.max' => 'Nilai maximal 100',
            'nilaipost.min' => 'Nilai minimal 1',
        ]);
        if ($validator->fails()) {
            return redirect('/training/icfsm/tambah')
                ->withErrors($validator)
                ->withInput($request->input());
        }
       //insert ke table user

        $icfsm = new inclassfsm;
        $icfsm->tanggal = $request->tanggal;
        $icfsm->nama_employee = $request->nama_employee;
        $icfsm->id_trainer = $request->id_trainer;
        $icfsm->email = $request->email;
        $icfsm->nohp = $request->nohp;
        $icfsm->status = $request->status;
        $icfsm->jabatan = $request->jabatan;
        $icfsm->account = $request->account;
        $icfsm->nama_toko = $request->nama_toko;
        $icfsm->category = $request->category;
        $icfsm->kota = $request->kota;
        $icfsm->produk = $request->produk;
        $icfsm->nilaipre = $request->nilaipre;
        $icfsm->nilaipost = $request->nilaipost;
        $icfsm->save();
        return redirect('/training/icfsm')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inclassfsm  $inclassfsm
     * @return \Illuminate\Http\Response
     */
    public function show(inclassfsm $inclassfsm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inclassfsm  $inclassfsm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if ($user->level == 'Admin'){
            $trainer = trainer::all();
            $icfsm = inclassfsm::find($id);
            return view('pages.training.icfsm.edit',[
                'icfsm' => $icfsm
            ]);
        }elseif ($user->level == 'Trainer') {
            $userID = Auth::user()->id;
            $trainer = trainer::where('user_id',$userID)->first();
            $icfsm = inclassfsm::find($id);
            if($icfsm->id_trainer == $trainer->id_trainer){
                return view('pages.training.icfsm.edit',[
                    'icfsm' => $icfsm
                ]);
            }else{
                return redirect('/training/icfsm')->with('error', 'Anda Tidak Memiliki Akses');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inclassfsm  $inclassfsm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'tanggal' => 'required|max:255',
            // 'nama_employee' => 'required|max:255',
            // 'trainer_id' => 'required|max:255',
            'email' => 'required|max:255',
            'nohp' => 'required|max:255',
            'status' => 'required|max:255',
            'jabatan' => 'required|max:255',
            'account' => 'required|max:255',
            'nama_toko' => 'required|max:255',
            'category' => 'required|max:255',
            'kota' => 'required|max:255',
            'produk' => 'required|max:255',
            'nilaipre' => 'required|integer|max:100|min:0',
            'nilaipost' => 'required|integer|max:100|min:0',
        ];

        $customMessage = [
            'tanggal.required' => 'Silahkan isi Tanggal Aktifitas Training Tersebut',
            // 'nama_employee.required' => 'Silahkan isi Form Nama Employee Tersebut',
            // 'trainer_id.required' => 'Silahkan Isi Form Trainer ID Tersebut',
            'email.required' => 'Silahkan Isi Form Email Tersebut',
            'nohp.required' => 'Silahkan Isi Form No Handphone Tersebut',
            'status.required' => 'Silahkan Pilih Status FSM',
            'jabatan.required' => 'Silahkan Pilih Jabatan FSM',
            'account.required' => 'Silahkan Pilih Account Group',
            'nama_toko.required' => 'Silahkan Isi Form Nama Toko Tersebut',
            'category.required' => 'Silahkan Isi Form Category Tersebut',
            'kota.required' => 'Silahkan Pilih Kota',
            'produk.required' => 'Silahkan isi Form Produk yang diajarkan Tersebut',
            'nilaipre.required' => 'Silahkan isi Form Nilai Pretest Tersebut',
            'nilaipre.max' => 'Nilai maximal 100',
            'nilaipre.min' => 'Nilai minimal 1',
            'nilaipost.required' => 'Silahkan isi Form Nilai Postest Tersebut',
            'nilaipost.max' => 'Nilai maximal 100',
            'nilaipost.min' => 'Nilai minimal 1',
        ];
        $this->validate($request, $rules, $customMessage);
        inclassfsm::where('id_icf',$id)
        ->update([
            'tanggal' => $request->tanggal,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'status' => $request->status,
            'jabatan' => $request->jabatan,
            'account' => $request->account,
            'nama_toko' => $request->nama_toko,
            'category' => $request->category,
            'kota' => $request->kota,
            'produk' => $request->produk,
            'nilaipre' => $request->nilaipre,
            'nilaipost' => $request->nilaipost,
        ]);
        return redirect('/training/icfsm')->with('success', 'Data Berhasil di Edit');
    }
    public function destroy($id)
    {
        $icfsm = inclassfsm::find($id);
        $icfsm->delete();
        return redirect('/training/icfsm')->with('success', 'Data Berhasil di Hapus');
    }
}
