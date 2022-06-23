<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\employee;
use App\Models\product;

class TrainingController extends Controller
{
    public function ajax()
    {
        $p = employee::where('status_employee','=', 'Aktif')->get();
        return response()->json($p);
    }

    public function getProduct($id)
    {
        $category = category::where('nama_kategori', $id)->first();
        $product = product::where("id_category",$category->id_category)->first();
        if($product == []){
            return response()->json([
                'success' => false,
            ]);
        }else{
            $products = product::where("id_category",$category->id_category)->pluck("nama_produk","id_product");
            return json_encode($products);
        }
    }
}
