<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\instorepromotor;
use App\Models\category;
use App\Models\product;
use App\Models\trainer;
use Auth;
use Image;
use Illuminate\Support\Facades\Crypt;

class InstorepromotorController extends Controller
{
    public function download($id)
    {
        $aduanID = Crypt::decrypt($id);
        $aduans = instorepromotor::find($aduanID);

        $fileIdentitas = $aduans->gambar;
        $file= public_path('admin/img/gambar_aktivitas/' . $fileIdentitas);
        $headers = ['Content-Type: image/png'];
        $newName = $aduans->id_isp .'-In Store Promotor'.'.jpg';

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
            $isps = instorepromotor::paginate(15);
        }elseif ($user->level == 'Trainer'){
            $userID = Auth::user()->id;
            $trainer = trainer::where('user_id',$userID)->first();
            $isps = instorepromotor::where('id_trainer',$trainer->id_trainer)->paginate(15);
        }
        return view('pages.training.isp.index',[
            'isps' => $isps,
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
        return view('pages.training.isp.create',compact('trainer','categories','products'));
    }

    public function getProduct($id)
    {
        $category = category::where('nama_kategori', $id)->first();
        $products = product::where("id_category",$category->id_category)->pluck("nama_produk","id_product");
        return json_encode($products);
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
            'gambar' => 'required|image|max:5000',
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
            return redirect('/training/isp/tambah')
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

        $isp = new instorepromotor;
        $isp->tanggal = $request->tanggal;
        $isp->id_employee = $request->id_employee;
        $isp->nama_employee = $request->nama_employee;
        $isp->id_trainer = $request->id_trainer;
        $isp->instore = $request->instore;
        $isp->jenis = $request->jenis;
        $isp->produk = $request->produk;
        $isp->jenis_ajar = $request->jenis_ajar;
        $isp->tipe_produk = $request->tipe_produk;
        $isp->issue = $request->issue;
        $isp->gambar = $filenameGambar;
        $isp->nilai_selling1 = $request->nilai_selling1;
        $isp->nilai_selling2 = $request->nilai_selling2;
        $isp->nilai_selling3 = $request->nilai_selling3;
        $isp->nilai_selling4 = $request->nilai_selling4;
        $isp->nilai_selling5 = $request->nilai_selling5;
        $isp->nilai_selling6 = $request->nilai_selling6;
        $isp->nilai_selling7 = $request->nilai_selling7;
        $isp->nilai_selling8 = $request->nilai_selling8;
        $isp->nilai_selling9 = $request->nilai_selling9;
        $isp->nilai_selling10 = $request->nilai_selling10;
        $isp->nilai_produk1 = $request->nilai_produk1;
        $isp->nilai_produk2 = $request->nilai_produk2;
        $isp->nilai_produk3 = $request->nilai_produk3;
        $isp->nilai_produk4 = $request->nilai_produk4;
        $isp->nilai_produk5 = $request->nilai_produk5;
        $isp->nilai_knowledge1 = $request->nilai_knowledge1;
        $isp->nilai_knowledge2 = $request->nilai_knowledge2;
        $isp->nilai_knowledge3 = $request->nilai_knowledge3;
        $isp->nilai_knowledge4 = $request->nilai_knowledge4;
        $isp->nilai_knowledge5 = $request->nilai_knowledge5;
        $isp->save();
        return redirect('/training/isp')->with('success', 'Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\instorepromotor  $instorepromotor
     * @return \Illuminate\Http\Response
     */
    public function show(instorepromotor $instorepromotor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\instorepromotor  $instorepromotor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $categories = category::all();
        if ($user->level == 'Admin'){
            $trainer = trainer::all();
            $isp = instorepromotor::find($id);
            return view('pages/training/isp/edit',[
                'isp' => $isp,
                'categories' => $categories
            ]);
        }elseif ($user->level == 'Trainer') {
            $userID = Auth::user()->id;
            $trainer = trainer::where('user_id',$userID)->first();
            $isp = instorepromotor::find($id);
            if($isp->id_trainer == $trainer->id_trainer){
                return view('pages/training/isp/edit',[
                    'isp' => $isp,
                    'categories' => $categories
                ]);
            }else{
                return redirect('/training/isp')->with('error', 'Anda Tidak Memiliki Akses');
            }
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\instorepromotor  $instorepromotor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'tanggal' => 'required|max:255',
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
        $isp = instorepromotor::find($id);
        $isp->update([
            'tanggal' => $request->tanggal,
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
            $gambar = public_path("admin/img/gambar_aktivitas/{$isp->gambar}");
            if (File::exists($gambar)) {
                unlink($gambar);
            }
            $gambarBaru = $request->file('gambar');
            $filenameGambar = Str::random(10).'-'.$gambarBaru->getClientOriginalName();
            $img = Image::make($gambarBaru)->resize(300, NULL, function($constraint){
                $constraint->aspectRatio();
            });
            $img->save(public_path('/admin/img/gambar_aktivitas/' . $filenameGambar));

            $isp->gambar = $filenameGambar;
            $isp->save();
        }
        return redirect('/training/isp')->with('success', 'Data Berhasil di Edit');
    }
    public function destroy($id)
    {
        $isp = instorepromotor::find($id);
        $isp->delete();
        return redirect('/training/isp')->with('success', 'Data Berhasil di Hapus');
    }
}
