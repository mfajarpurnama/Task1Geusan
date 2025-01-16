<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('variants')->get(); // Eager load variants
        return view('index', compact('products'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        return view('create');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $product = Product::create($request->all());
        return redirect('/');
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        $product = Product::with('variants')->findOrFail($id);
        return view('edit', compact('product'));
    }

    // Mengupdate produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect('/');
    }

    // Menghapus produk
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/');
    }
}
