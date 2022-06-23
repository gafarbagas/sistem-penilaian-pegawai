<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view('pages.category.index', compact('categories'));
    }

    public function create()
    {
        return view ('pages.category.create');
    }

    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'nama_kategori' => 'required|max:255'
            ],[
                'nama_kategori.required' => 'Silahkan isi Form Nama Tersebut',
            ]);
            if ($validator->fails()) {
                return redirect('/category/tambah')
                    ->withErrors($validator)
                    ->withInput($request->input());
            }
            $category = category::create($request->all());
            return redirect('/category')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $category = category::where('id_category',$id)->get();
        return view('pages/category/edit',['category' => $category]);
    }

    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return redirect('/category')->with('delete', 'Data Berhasil di Hapus');
    }
}
