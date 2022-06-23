<?php

namespace App\Http\Controllers;

use App\Models\site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site = site::all();
        return view('pages.site.index', [
            'site' => $site
        ] );
        // return view ('pages.site.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.site.create');
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
            'nama_site' => 'required',
            'site_id' => 'required|unique:sites',
        ],[
            'nama_site.required' => 'Silahkan isi Form Nama Tersebut',
            'site_id.required' => 'Silahkan isi Form Site ID Tersebut',
            'site_id.unique' => 'Data Site ID ini sudah ada'
        ]);
        if ($validator->fails()) {
            return redirect('/site/tambah')
                ->withErrors($validator)
                ->withInput($request->input());
        } 
        //insert ke table user
        $site = new site;
        $site->nama_site = $request->nama_site;
        $site->site_id = $request->site_id;
        $site->save();
        return redirect('/site')->with('success', 'Data Berhasil di Tambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $site = DB::table('sites')->where('id_site',$id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('pages/site/edit',['site' => $site]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'site_id' => [
                'required',
                Rule::unique('sites')->ignore($id, 'id_site'),
            ],
            'nama_site' => 'required|max:255',
        ];

        $customMessage = [
            'nama_site.required' => 'Silahkan isi Form Nama Site Tersebut',
            'site_id.required' => 'Silahkan isi Form Site ID Tersebut',
            'site_id.unique' => 'Data Site ID ini sudah ada',
        ];
        
        $this->validate($request, $rules, $customMessage);
        site::where('id_site',$id)
        ->update([
            'nama_site' => $request->nama_site,
            'site_id' => $request->site_id
        ]);
        return redirect('/site')->with('success', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site = Site::find($id);
        $site->delete();
        return redirect('/site')->with('delete', 'Data Berhasil di Hapus');
    }
}
