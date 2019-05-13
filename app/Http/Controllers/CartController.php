<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $carts = Session::get('cart');
        return view('carts.list', compact('carts'));
    }

    public function add($product_id)
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
        } else {
            $oldCart = null;
        }

        $cart = new Cart($oldCart);
        $cart->add($product_id);
        Session::put('cart', $cart);
        return redirect()->route('products.index');
    }
}
