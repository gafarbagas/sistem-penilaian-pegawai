<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\employee;
use App\Models\grup;
use App\Models\trainer;
use Auth;

class GrupController extends Controller
{
    public function index()
    {
        $userID = Auth::user()->id;
        $trainer = trainer::where('user_id',$userID)->first();
        $trainerID = $trainer->id_trainer;
        $grups = grup::where('id_trainer',$trainerID)->get();
        return view('pages.grup.index', compact('grups'));
    }

    public function create()
    {
        return view('pages.grup.create');
    }

    public function ambildata(Request $request){
        $cek = employee::where('nama_employee',$request->nama_employee)->count();
        
        if($cek === 1){
            $ambildata = employee::where('nama_employee',$request->nama_employee)->first();
            return view('pages.grup.ambildata', compact('ambildata'));
        }
        else{
            return response()->json([
                'success' => false,
            ]);
        };
    }

    public function store(Request $request)
    {
        $rules = [
            'id_employee' => 'required'
        ];

        $customMessage = [
            'required' => 'Silahkan Masukan :attribute'
        ];
        
        $this->validate($request, $rules, $customMessage);
        
        DB::beginTransaction();
        try{
            $userID = Auth::user()->id;
            // dd($userID);
            $trainer = trainer::where('user_id',$userID)->first();

            $grup = grup::create([
                'id_trainer' => $trainer->id_trainer,
                'id_employee' => $request->id_employee,
            ]);
        }catch(\Throwable $th)
        {
            DB::rollback();
            throw $th;
        }
        DB::commit();

        return response()->json(
            [
                'success' => true,
                'message' => 'Tambah Member Berhasil'
            ]
        );
    }

    public function destroy($id)
    {
        $grup = grup::find($id);
        $grup->delete();
        return redirect('/grup')->with('delete', 'Data Berhasil di Hapus');
    }
}
