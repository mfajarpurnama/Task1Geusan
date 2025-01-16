<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
   // Menampilkan form create
   public function create()
   {
       $products = Product::all(); // Ambil semua product untuk dropdown
       return view('createdetail', compact('products'));
   }

   // Menyimpan data ke database
   public function store(Request $request)
   {
       $request->validate([
           'product_id' => 'required|exists:products,id',
           'variant_name' => 'required|string|max:255',
           'price' => 'required|numeric|min:0',
           'stock' => 'required|integer|min:0',
       ]);

       ProductVariant::create($request->all());

       return redirect('/')->with('success', 'Product Variant created successfully!');
   }
   public function edit($id)
   {
       $variant = ProductVariant::findOrFail($id);
       $products = Product::all(); // Ambil semua produk untuk dropdown
       return view('editvariant', compact('variant', 'products'));
   }

   // Memperbarui data di database
   public function update(Request $request, $id)
   {
       $request->validate([
           'product_id' => 'required|exists:products,id',
           'variant_name' => 'required|string|max:255',
           'price' => 'required|numeric|min:0',
           'stock' => 'required|integer|min:0',
       ]);

       $variant = ProductVariant::findOrFail($id);
       $variant->update($request->all());

       return redirect('/')->with('success', 'Product Variant updated successfully!');
   }
   public function destroy($id)
   {
       $variant = ProductVariant::findOrFail($id);
       $variant->delete();

       return redirect('/')->with('success', 'Product Variant deleted successfully!');
       
   }
}
