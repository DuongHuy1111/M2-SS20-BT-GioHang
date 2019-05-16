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

    public function remove($id)
    {

        $carts = Session::get('cart');
        $productsIntoCart = $carts->items;
        $carts->totalQty -= $productsIntoCart[$id]['qty'];
        $carts->totalPrice -= $productsIntoCart[$id]['price'];

        unset($productsIntoCart[$id]);

        $carts->items = $productsIntoCart;
        Session::put('cart', $carts);
        if (Session::get('cart')->totalQty == 0) {
            Session::forget('cart');
        }
        return redirect()->back();

    }

    public function deleteCart()
    {
        if (Session::has('cart')) {
            Session::forget('cart');
        } else {
            Session::flash('Success', 'No Cart');
        }

        return redirect()->route('carts.index');
    }

    public function update(Request $request, $id)
    {
        $newQty = $request->input('qty');
        $cart = Session::get('cart');
        $cart->update($newQty, $id);
        Session::put('cart', $cart);
        return redirect()->route('carts.index');
    }
}
