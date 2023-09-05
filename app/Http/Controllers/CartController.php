<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartProducts = CartProduct::where('user_id', Auth::user()->id)->get();
        return view('cart', ['cartProducts' => $cartProducts]);
    }

    public function store(Request $request)
    {

        if (Auth::check()) {
            $productId = $request->productId;
            $userId = Auth::user()->id;

            $cart = new CartProduct();
            $cart->user_id = $userId;
            $cart->product_id = $productId;

            $cart->save();
            $cartProducts = CartProduct::where('user_id', Auth::user()->id)->get();
            return view('cart', ['cartProducts' => $cartProducts]);
        }
        return redirect()->route('login');
    }
}
