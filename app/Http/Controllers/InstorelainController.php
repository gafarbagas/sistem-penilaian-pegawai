<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\instorelain;
use App\Models\category;
use App\Models\product;
use App\Models\trainer;
use Auth;
use Image;
use Illuminate\Support\Facades\Crypt;

class InstorelainController extends Controller
{
    public function download1($id)
    {
        $aduanID = Crypt::decrypt($id);
        $aduans = instorelain::find($aduanID);

        $fileIdentitas = $aduans->gambar;
        // $pathToFile = public_path('admin/img/gambar_aktivitas/' . $fileIdentitas);
        // $headers = ['Content-Type: application/pdf'];
        // return response()->download($pathToFile);
        $file= public_path('admin/img/gambar_aktivitas/' . $fileIdentitas);
        $headers = ['Content-Type: image/png'];
        $newName = $aduans->id_isl .'-In Store Lain Lain'.'.jpg';

        return response()->download($file, $newName, $headers);
        // return $pathToFile;
    }
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
            $islls = instorelain::paginate(15);
        }elseif ($user->level == 'Trainer'){
            $userID = Auth::user()->id;
            $trainer = trainer::where('user_id',$userID)->first();
            $islls = instorelain::where('id_trainer',$trainer->id_trainer)->paginate(15);
        }
        return view('pages.training.isll.index',[
            'islls' => $islls,
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
        $categories = category::all();
        $products = product::all();
        $userID = Auth::user()->id;
        $trainer = trainer::where('user_id',$userID)->first();
        return view('pages.training.isll.create',compact('trainer','categories','products'));
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
            'instore' => 'required|max:255',
            'jenis' => 'required|max:255',
            'produk' => 'required|max:255',
            'tipe_produk' => 'required|max:255',
            'issue' => 'required|max:255',
            'gambar' => 'required|image|max:2048',
            'nilai_selling1' => 'required|max:255',
            'nilai_selling2' => 'required|max:255',
            'nilai_selling3' => 'required|max:255',
            'nilai_selling4' => 'required|max:255',
            'nilai_selling5' => 'required|max:255',
            'nilai_selling6' => 'required|max:255',
            'nilai_selling7' => 'required|max:255',
            'nilai_selling8' => 'required|max:255',
            'nilai_selling9' => 'required|max:255',
            'nilai_selling10' => 'required|max:255',
            'nilai_produk1' => 'required|max:255',
            'nilai_produk2' => 'required|max:255',
            'nilai_produk3' => 'required|max:255',
            'nilai_produk4' => 'required|max:255',
            'nilai_produk5' => 'required|max:255',
            'nilai_knowledge1' => 'required|max:255',
            'nilai_knowledge2' => 'required|max:255',
            'nilai_knowledge3' => 'required|max:255',
            'nilai_knowledge4' => 'required|max:255',
            'nilai_knowledge5' => 'required|max:255',
        ],[
            'tanggal.required' => 'Silahkan isi Tanggal Aktifitas Training Tersebut',
            'employee_id.required' => 'Silahkan isi Id Employee Tersebut',
            'nama_employee.required' => 'Silahkan isi Nama Employee Tersebut',
            'instore.required' => 'Silahkan isi Instore Tersebut',
            'jenis.required' => 'Silahkan isi Jenis Ajar  Tersebut',
            'produk.required' => 'Silahkan isi Produk Tersebut',
            'tipe_produk.required' => 'Silahkan isi Tipe Produk Tersebut',
            'issue.required' => 'Silahkan isi Issue Tersebut',
            'gambar.required' => 'Silahkan isi Gambar Tersebut',
            'gambar.image' => 'File harus berbentuk gambar',
            'gambar.max' => 'Ukuran file terlalu besar Maksimal 5 MB',
            'nilai_selling1.required' => 'Silahkan isi Nilai Selling 1 Tersebut',
            'nilai_selling2.required' => 'Silahkan isi Nilai Selling 2 Tersebut',
            'nilai_selling3.required' => 'Silahkan isi Nilai Selling 3 Tersebut',
            'nilai_selling4.required' => 'Silahkan isi Nilai Selling 4 Tersebut',
            'nilai_selling5.required' => 'Silahkan isi Nilai Selling 5 Tersebut',
            'nilai_selling6.required' => 'Silahkan isi Nilai Selling 6 Tersebut',
            'nilai_selling7.required' => 'Silahkan isi Nilai Selling 7 Tersebut',
            'nilai_selling8.required' => 'Silahkan isi Nilai Selling 8 Tersebut',
            'nilai_selling9.required' => 'Silahkan isi Nilai Selling 9 Tersebut',
            'nilai_selling10.required' => 'Silahkan isi Nilai Selling 10 Tersebut',
            'nilai_produk1.required' => 'Silahkan isi Nilai Produk 1 Tersebut',
            'nilai_produk2.required' => 'Silahkan isi Nilai Produk 2 Tersebut',
            'nilai_produk3.required' => 'Silahkan isi Nilai Produk 3 Tersebut',
            'nilai_produk4.required' => 'Silahkan isi Nilai Produk 4 Tersebut',
            'nilai_produk5.required' => 'Silahkan isi Nilai Produk 5 Tersebut',
            'nilai_knowledge1.required' => 'Silahkan isi Nilai Knowledge 1 Tersebut',
            'nilai_knowledge2.required' => 'Silahkan isi Nilai Knowledge 2 Tersebut',
            'nilai_knowledge3.required' => 'Silahkan isi Nilai Knowledge 3 Tersebut',
            'nilai_knowledge4.required' => 'Silahkan isi Nilai Knowledge 4 Tersebut',
            'nilai_knowledge5.required' => 'Silahkan isi Nilai Knowledge 5 Tersebut',
        ]);
        if ($validator->fails()) {
            return redirect('/training/isll/tambah')
                ->withErrors($validator)
                ->withInput($request->input());
        }

		$pathGambar = 'admin/img/gambar_aktivitas/';
        if (!file_exists(public_path($pathGambar))) {
            mkdir(public_path($pathGambar), 755, true);
        }

        $gambar = $request->file('gambar');
        $filenameGambar = Str::random(10).'-'.$gambar->getClientOriginalName();
        $img = Image::make($gambar)->resize(600, NULL, function($constraint){
            $constraint->aspectRatio();
        });
        $img->save(public_path('admin/img/gambar_aktivitas/'. $filenameGambar));

        $isl = new instorelain;
        $isl->tanggal = $request->tanggal;
        $isl->employee_id = $request->employee_id;
        $isl->nama_employee = $request->nama_employee;
        $isl->id_trainer = $request->id_trainer;
        $isl->instore = $request->instore;
        $isl->jenis = $request->jenis;
        $isl->produk = $request->produk;
        $isl->jenis_ajar = $request->jenis_ajar;
        $isl->tipe_produk = $request->tipe_produk;
        $isl->issue = $request->issue;
        $isl->gambar = $filenameGambar;
        $isl->nilai_selling1 = $request->nilai_selling1;
        $isl->nilai_selling2 = $request->nilai_selling2;
        $isl->nilai_selling3 = $request->nilai_selling3;
        $isl->nilai_selling4 = $request->nilai_selling4;
        $isl->nilai_selling5 = $request->nilai_selling5;
        $isl->nilai_selling6 = $request->nilai_selling6;
        $isl->nilai_selling7 = $request->nilai_selling7;
        $isl->nilai_selling8 = $request->nilai_selling8;
        $isl->nilai_selling9 = $request->nilai_selling9;
        $isl->nilai_selling10 = $request->nilai_selling10;
        $isl->nilai_produk1 = $request->nilai_produk1;
        $isl->nilai_produk2 = $request->nilai_produk2;
        $isl->nilai_produk3 = $request->nilai_produk3;
        $isl->nilai_produk4 = $request->nilai_produk4;
        $isl->nilai_produk5 = $request->nilai_produk5;
        $isl->nilai_knowledge1 = $request->nilai_knowledge1;
        $isl->nilai_knowledge2 = $request->nilai_knowledge2;
        $isl->nilai_knowledge3 = $request->nilai_knowledge3;
        $isl->nilai_knowledge4 = $request->nilai_knowledge4;
        $isl->nilai_knowledge5 = $request->nilai_knowledge5;
        $isl->save();
        return redirect('/training/isll')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\instorelain  $instorelain
     * @return \Illuminate\Http\Response
     */
    public function show(instorelain $instorelain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\instorelain  $instorelain
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $categories = category::all();
        if ($user->level == 'Admin'){
            $trainer = trainer::all();
            $isll = instorelain::find($id);
            return view('pages/training/isll/edit',[
                'isll' => $isll,
                'categories' => $categories
            ]);
        }elseif ($user->level == 'Trainer') {
            $userID = Auth::user()->id;
            $trainer = trainer::where('user_id',$userID)->first();
            $isll = instorelain::find($id);
            if($isll->id_trainer == $trainer->id_trainer){
                return view('pages/training/isll/edit',[
                    'isll' => $isll,
                    'categories' => $categories
                ]);
            }else{
                return redirect('/training/isll')->with('error', 'Anda Tidak Memiliki Akses');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\instorelain  $instorelain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $rules = [
            'tanggal' => 'required|max:255',
            'employee_id' => 'required|max:255',
            'nama_employee' => 'required|max:255',
            'instore' => 'required|max:255',
            'jenis' => 'required|max:255',
            'tipe_produk' => 'required|max:255',
            'issue' => 'required|max:255',
            'nilai_selling1' => 'required|max:255',
            'nilai_selling2' => 'required|max:255',
            'nilai_selling3' => 'required|max:255',
            'nilai_selling4' => 'required|max:255',
            'nilai_selling5' => 'required|max:255',
            'nilai_selling6' => 'required|max:255',
            'nilai_selling7' => 'required|max:255',
            'nilai_selling8' => 'required|max:255',
            'nilai_selling9' => 'required|max:255',
            'nilai_selling10' => 'required|max:255',
            'nilai_produk1' => 'required|max:255',
            'nilai_produk2' => 'required|max:255',
            'nilai_produk3' => 'required|max:255',
            'nilai_produk4' => 'required|max:255',
            'nilai_produk5' => 'required|max:255',
            'nilai_knowledge1' => 'required|max:255',
            'nilai_knowledge2' => 'required|max:255',
            'nilai_knowledge3' => 'required|max:255',
            'nilai_knowledge4' => 'required|max:255',
            'nilai_knowledge5' => 'required|max:255',
        ];

        $customMessage = [
            'tanggal.required' => 'Silahkan isi Tanggal Aktifitas Training Tersebut',
            'employee_id.required' => 'Silahkan isi  Tersebut',
            'nama_employee.required' => 'Silahkan isi  Tersebut',
            'instore.required' => 'Silahkan isi  Tersebut',
            'jenis.required' => 'Silahkan isi  Tersebut',
            'tipe_produk.required' => 'Silahkan isi  Tersebut',
            'issue.required' => 'Silahkan isi  Tersebut',
            'nilai_selling1.required' => 'Silahkan isi Nilai Selling 1 Tersebut',
            'nilai_selling2.required' => 'Silahkan isi Nilai Selling 2 Tersebut',
            'nilai_selling3.required' => 'Silahkan isi Nilai Selling 3 Tersebut',
            'nilai_selling4.required' => 'Silahkan isi Nilai Selling 4 Tersebut',
            'nilai_selling5.required' => 'Silahkan isi Nilai Selling 5 Tersebut',
            'nilai_selling6.required' => 'Silahkan isi Nilai Selling 6 Tersebut',
            'nilai_selling7.required' => 'Silahkan isi Nilai Selling 7 Tersebut',
            'nilai_selling8.required' => 'Silahkan isi Nilai Selling 8 Tersebut',
            'nilai_selling9.required' => 'Silahkan isi Nilai Selling 9 Tersebut',
            'nilai_selling10.required' => 'Silahkan isi Nilai Selling 10 Tersebut',
            'nilai_produk1.required' => 'Silahkan isi Nilai Produk 1 Tersebut',
            'nilai_produk2.required' => 'Silahkan isi Nilai Produk 2 Tersebut',
            'nilai_produk3.required' => 'Silahkan isi Nilai Produk 3 Tersebut',
            'nilai_produk4.required' => 'Silahkan isi Nilai Produk 4 Tersebut',
            'nilai_produk5.required' => 'Silahkan isi Nilai Produk 5 Tersebut',
            'nilai_knowledge1.required' => 'Silahkan isi Nilai Knowledge 1 Tersebut',
            'nilai_knowledge2.required' => 'Silahkan isi Nilai Knowledge 2 Tersebut',
            'nilai_knowledge3.required' => 'Silahkan isi Nilai Knowledge 3 Tersebut',
            'nilai_knowledge4.required' => 'Silahkan isi Nilai Knowledge 4 Tersebut',
            'nilai_knowledge5.required' => 'Silahkan isi Nilai Knowledge 5 Tersebut',
        ];
        $this->validate($request, $rules, $customMessage);

        $isll = instorelain::find($id);
        $isll->update([
            'tanggal' => $request->tanggal,
            'employee_id' => $request->employee_id,
            'nama_employee' => $request->nama_employee,
            'instore' => $request->instore,
            'jenis' => $request->jenis,
            'tipe_produk' => $request->tipe_produk,
            'issue' => $request->issue,
            'nilai_selling1' => $request->nilai_selling1,
            'nilai_selling2' => $request->nilai_selling2,
            'nilai_selling3' => $request->nilai_selling3,
            'nilai_selling4' => $request->nilai_selling4,
            'nilai_selling5' => $request->nilai_selling5,
            'nilai_selling6' => $request->nilai_selling6,
            'nilai_selling7' => $request->nilai_selling7,
            'nilai_selling8' => $request->nilai_selling8,
            'nilai_selling9' => $request->nilai_selling9,
            'nilai_selling10' => $request->nilai_selling10,
            'nilai_produk1' => $request->nilai_produk1,
            'nilai_produk2' => $request->nilai_produk2,
            'nilai_produk3' => $request->nilai_produk3,
            'nilai_produk4' => $request->nilai_produk4,
            'nilai_produk5' => $request->nilai_produk5,
            'nilai_knowledge1' => $request->nilai_knowledge1,
            'nilai_knowledge2' => $request->nilai_knowledge2,
            'nilai_knowledge3' => $request->nilai_knowledge3,
            'nilai_knowledge4' => $request->nilai_knowledge4,
            'nilai_knowledge5' => $request->nilai_knowledge5,
        ]);

        if($request->hasFile('gambar')){
            $cek = [
                'gambar' => 'required|image|max:5000',
            ];

            $message = [
                'gambar.required' => 'Silahkan isi Gambar Tersebut',
                'gambar.image' => 'File harus berbentuk gambar',
                'gambar.max' => 'Ukuran file terlalu besar Maksimal 5 MB',
            ];
            $this->validate($request, $cek, $message);
            $gambar = public_path("admin/img/gambar_aktivitas/{$isll->gambar}");
            if (File::exists($gambar)) {
                unlink($gambar);
            }
            $gambarBaru = $request->file('gambar');
            $filenameGambar = Str::random(10).'-'.$gambarBaru->getClientOriginalName();
            $img = Image::make($gambarBaru)->resize(300, NULL, function($constraint){
                $constraint->aspectRatio();
            });
            $img->save(public_path('/admin/img/gambar_aktivitas/' . $filenameGambar));

            $isll->gambar = $filenameGambar;
            $isll->save();
        }

        return redirect('/training/isll')->with('success', 'Data Berhasil di Edit');
    }
    public function destroy($id)
    {
        $isll = instorelain::find($id);
        $isll->delete();
        return redirect('/training/isll')->with('success', 'Data Berhasil di Hapus');
    }
}
