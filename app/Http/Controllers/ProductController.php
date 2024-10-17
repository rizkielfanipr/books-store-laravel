<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::where('is_active', true)->get();
        return view('customer.products.index', compact('products'));
    }

    // Menampilkan detail produk
    public function show(Product $product)
    {
        return view('customer.products.show', compact('product'));
    }
}
