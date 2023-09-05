<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $Electronics = Product::where('product_type','Electronics')->get();
        $Kitchen = Product::where('product_type','Kitchen')->get();
        $Beauty = Product::where('product_type','Beauty')->get();
        $Womenskurtis = Product::where('product_type','Womens_kurtis')->get();
        return view('home',['Electronics'=>$Electronics,'Kitchen'=>$Kitchen,'Beauty'=>$Beauty,'Womenskurtis'=>$Womenskurtis]);
    }
    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'details'=>'required',
            'product_type'=>'required',
            'product_img'=>'required|mimes:jpg,jpeg,png,gif|max:10000'
        ]);

        //upload image
        $imageName = time() . '.' . $request->product_img->extension();
        $request->product_img->move(public_path('uploads/products') , $imageName);

        $prodct = new Product();
        $prodct->name = $request->name;
        $prodct->price = $request->price;
        $prodct->details = $request->details;
        $prodct->product_type = $request->product_type;
        $prodct->product_img = $imageName;

        $prodct->save();
        return back()->withSuccess('Product added successfully');

    }



}
