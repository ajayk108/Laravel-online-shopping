<?php

namespace App\Http\Controllers;

use App\Models\Product;


use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function index(){

        return view('productDetails');
    }

    public function show(Request $request){
        $productId = $request->productId;
        $product = Product::where('id', $productId)->get();
        return view('productDetails',['product'=>$product]);
    }

}
