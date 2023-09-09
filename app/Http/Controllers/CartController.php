<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;
use function PHPUnit\Framework\isNull;

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

            $product = Product::where('id', $request->productId)->first();
            $cart = CartProduct::where('user_id', $userId)->where('product_id', $productId)->first();
            if (is_null($cart)) {
                $cart = new CartProduct();
                $cart->user_id = $userId;
                $cart->product_id = $productId;
                $cart->quantity = 1;
                $cart->total = ($product->price * $cart->quantity);
                $cart->save();
            } else {
                if ($request->decrement || $request->increment) {
                    // code for increment decrement of quntity in cart
                    if ($request->decrement == "dec") {
                        $cart->quantity -= 1;
                        $cart->total = ($product->price * $cart->quantity);
                        $cart->save();
                    }else{
                        $cart->quantity += 1;
                        $cart->total = ($product->price * $cart->quantity);
                        $cart->save();
                    }
                } else {
                    // code for increment quantity on same item added to cart
                    $cart->quantity += 1;
                    $cart->total = ($product->price * $cart->quantity);
                    $cart->save();
                }
            }

            $cartProducts = CartProduct::where('user_id', $userId)->get();
            return view('cart', ['cartProducts' => $cartProducts]);
        }
        return redirect()->route('login');
    }

    public function destroy($id){
        $cart = CartProduct::where('id', $id)->first();
        $cart->delete();

        return back();
    }
}
