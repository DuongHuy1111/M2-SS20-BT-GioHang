<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.list', compact('products'));
    }

    public function login()
    {

        return view('products.login');
    }

    public function loginAdmin(Request $request)
    {
        if ($request->user == 'admin' && $request->password == 'admin') {
            $request->session()->push('login', true);
            return redirect()->route('products.index');

        }
        $message = 'Login failed. Username or password is wrong';
        $request->session()->flash('login-fail', $message);
        return view('products.login');
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name_product');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $product->produce = $request->input('produce');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->image = $path;
        } else {
            dd('sdsd');
        }
        $product->save();
        return redirect()->route('products.index');
    }

    public function delete(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
