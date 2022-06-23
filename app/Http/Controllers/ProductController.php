<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\product;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::all();
        return view('pages.product.index', compact('products'));
    }

    public function create()
    {
        $categories = category::all();
        return view ('pages.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'nama_produk' => 'required|max:255',
                'id_category' => 'required'
            ],[
                'nama_produk.required' => 'Silahkan isi Form Nama Tersebut',
                'id_category.required' => 'Silahkan isi Form Nama Tersebut',
            ]);
            if ($validator->fails()) {
                return redirect('/product/tambah')
                    ->withErrors($validator)
                    ->withInput($request->input());
            }
            $product = Product::create($request->all());
            return redirect('/product')->with('success', 'Data Berhasil di Tambahkan');
    }
    public function edit($id)
    {
        $product = product::find($id);
        $categories = category::all();
        return view('pages/product/edit',[
            'product' => $product,
            'categories' => $categories
        ]);
    }
    public function update($id, Request $request)
    {
        $rules = [
            'nama_produk' => 'required|max:255'
        ];

        $customMessage = [
            'nama_produk.required' => 'Silahkan isi Form Nama Product Tersebut',
        ];
        $this->validate($request, $rules, $customMessage);
        
        product::where('id_product',$id)
        ->update([
            'nama_produk' => $request->nama_produk,
        ]);
        return redirect('/product')->with('success', 'Data Berhasil di Edit');
    }
    public function destroy($id)
    {
        $Product = product::find($id);
        $Product->delete();
        return redirect('/product')->with('delete', 'Data Berhasil di Hapus');
    }
}
