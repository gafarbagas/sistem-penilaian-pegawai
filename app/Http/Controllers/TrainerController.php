<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainer = trainer::all();
        return view('pages.trainer.index', [
            'trainer' => $trainer
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.trainer.create');
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
                'nama_trainer' => 'required',
                'trainer_id' => 'required|unique:trainers',
                'trainer_area' => 'required',
            ],[
                'nama_trainer.required' => 'Silahkan isi Form Nama Tersebut',
                'trainer_id.required' => 'Silahkan isi Form Site ID Tersebut',
                'trainer_id.unique' => 'Data Site ID ini sudah ada',
                'trainer_area.required' => 'Silahkan isi Form Site ID Tersebut',
            ]);
            if ($validator->fails()) {
                return redirect('/trainer/tambah')
                    ->withErrors($validator)
                    ->withInput($request->input());
            } 
            //insert ke table user
            $user = new User;
            $user->name = $request->nama_trainer;
            $user->username = $request->trainer_id;
            $user->password = Hash::make($request->trainer_id);
            $user->level = 'Trainer';
            $user->save();
            //insert ke table trainer
            $request->request->Add(['user_id' => $user->id]);
            $trainer = trainer::create($request->all());
            return redirect('/trainer')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function show(trainer $trainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $trainer = DB::table('trainers')->where('id_trainer',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('pages/trainer/edit',['trainer' => $trainer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'trainer_id' => [
                'required',
                Rule::unique('trainers')->ignore($id, 'id_trainer'),
            ],
            'nama_trainer' => 'required|max:255',
            'trainer_area' => 'required|max:255',
        ];

        $customMessage = [
            'nama_trainer.required' => 'Silahkan isi Form Nama Trainer Tersebut',
            'trainer_id.required' => 'Silahkan isi Form Trainer ID Tersebut',
            'trainer_id.unique' => 'Data Trainer ID ini sudah ada',
            'trainer_area.required' => 'Silahkan isi Form Trainer Area Tersebut',
        ];
        
        $this->validate($request, $rules, $customMessage);
        trainer::where('id_trainer',$id)
        ->update([
            'nama_trainer' => $request->nama_trainer,
            'trainer_id' => $request->trainer_id,
            'trainer_area' => $request->trainer_area,
        ]);
        return redirect('/trainer')->with('success', 'Data Berhasil di Edit');
    }

    public function editpasswordform($id){
        $trainer = trainer::find($id);
        return view('pages.trainer.resetpassword', compact('trainer'));
    }

    public function editpasswordproses(Request $request, $id){
        $trainer = trainer::find($id);
        $user = User::where('id',$trainer->user_id)->first();
        $request->validate([
            'newpassword' => 'required|max:255'
        ]);
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();
        return redirect('/trainer')->with('success', 'Kata Sandi Berhasil di Ubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer = trainer::find($id);
        $user = $trainer->user;
        $trainer->delete();
        $user->delete();
        return redirect('/trainer')->with('delete', 'Data Berhasil di Hapus');
    }
}
