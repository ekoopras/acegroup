<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notifi;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //INDEX
    public function index($slug)
    {
        // ambil category berdasarkan slug
        $category = Category::where('slug', $slug)->firstOrFail();

        // ambil product sesuai category
        $products = $category->products()->get();

        return view('product.index', compact('category', 'products'));
    }

    //CREATE
    public function create(Category $category)
    {
        return view('product.create', compact('category'));
    }

    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required',
            'barang'     => 'required|string|max:255',
            'merek'      => 'nullable|string|max:255',
            'kondisi'    => 'required',
            'harga'      => 'required',
            'keterangan' => 'nullable|string',
        ]);

        // normalisasi harga
        $validated['harga'] = str_replace('.', '', $request->harga);

        // SIMPAN PRODUCT
        $product = Product::create($validated);

        // 🔔 SIMPAN NOTIFIKASI
        Notifi::create([
            'user_id' => Auth::id(),
            'title'   => 'Product Baru',
            'message' => Auth::user()->name . ' menambahkan product: ' . $product->barang,
            'type'    => 'product_create',
        ]);

        // redirect ke halaman category
        $category = Category::find($request->category_id);

        return redirect()->route('product.index', $category->slug)
            ->with('success', 'Product berhasil ditambahkan');
    }

    //EDIT
    public function edit(Category $category, Product $product)
    {
        // pastikan product milik category tsb
        if ($product->category_id !== $category->id) {
            abort(404);
        }

        return view('product.edit', compact('category', 'product'));
    }
    // UPDATE
    public function update(Request $request, Category $category, Product $product)
    {
        // pastikan product milik category tsb
        if ($product->category_id !== $category->id) {
            abort(404);
        }

        $validated = $request->validate([
            'barang'     => 'required|string|max:255',
            'merek'      => 'nullable|string|max:255',
            'kondisi'    => 'required|string',
            'harga'      => 'required',
            'keterangan' => 'nullable|string',
        ]);

        // normalisasi harga
        $validated['harga'] = str_replace('.', '', $validated['harga']);

        // UPDATE DATA (INI KUNCINYA)
        $product->update($validated);

        // 🔔 SIMPAN NOTIFIKASI
        Notifi::create([
            'user_id' => Auth::id(),
            'title'   => 'Product Diperbarui',
            'message' => Auth::user()->name . ' memperbarui product: ' . $product->barang,
            'type'    => 'product_update',
        ]);

        return redirect()
            ->route('product.index', $category->slug)
            ->with('success', 'Product berhasil diupdate');
    }

    // DELETE
    public function destroy(Category $category, Product $product)
    {
        // pastikan product milik category tsb
        if ($product->category_id !== $category->id) {
            abort(404);
        }

        $productName = $product->barang;

        $product->delete();

        // 🔔 SIMPAN NOTIFIKASI
        Notifi::create([
            'user_id' => Auth::id(),
            'title'   => 'Product Dihapus',
            'message' => Auth::user()->name . ' menghapus product: ' . $productName,
            'type'    => 'product_delete',
        ]);

        return redirect()
            ->route('product.index', $category->slug)
            ->with('success', 'Product berhasil dihapus');
    }
}
