<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    // Menampilkan form untuk menambah produk
    public function create()
    {
        return view('admin.products.create');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'is_active' => 'boolean',
        ]);
    
        $product = new Product();
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->image = $request->file('image') ? $request->file('image')->store('images') : null;
        $product->is_active = $request->has('is_active');
        $product->save();
    
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan');
    }
    
    // Menampilkan detail produk
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Memperbarui produk
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'required|boolean',
        ]);

        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($imagePath && Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images/products');
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        // Hapus gambar jika ada
        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}
