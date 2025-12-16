<?php

namespace App\Http\Controllers;

use App\Models\ProductLaptop;
use Illuminate\Http\Request;

class ProductLaptopController extends Controller
{
    public function index(){
        $product_laptops = ProductLaptop::latest()->get();
        return view('product.laptop.index', [
            'title' => 'Produk Laptop',
            'product_laptops' => $product_laptops
        ]);
    }

    public function create(){
        return view('product.laptop.create', [
        'title' => 'Tambah Produk'
    ]);
    }


    // STORE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang'     => 'required|string|max:255',
            'merek'      => 'nullable|string|max:255',
            'kondisi'    => 'required',
            'harga'      => 'required',
            'keterangan' => 'nullable|string',
        ]);

        // normalisasi harga
        $validated['harga'] = str_replace('.', '', $request->harga);

        ProductLaptop::create($validated);

        return redirect()
            ->route('product-laptop.index')
            ->with('success', 'Data berhasil disimpan');
    }

     // EDIT
    public function edit(ProductLaptop $product_laptop)
    {
        return view('product.laptop.edit', [
            'title' => 'Edit Produk Laptop',
            'product_laptop' => $product_laptop
        ]);
    }

    // UPDATE
    // =====================
    public function update(Request $request, ProductLaptop $product_laptop)
    {
        $validated = $request->validate([
            'barang'     => 'required|string|max:255',
            'merek'      => 'nullable|string|max:255',
            'kondisi'    => 'required',
            'harga'      => 'required',
            'keterangan' => 'nullable|string',
        ]);

        $validated['harga'] = str_replace('.', '', $request->harga);

        $product_laptop->update($validated);

        return redirect()
            ->route('product-laptop.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(ProductLaptop $product_laptop)
    {
        $product_laptop->delete();

        return redirect()
            ->route('product-laptop.index')
            ->with('success', 'Data berhasil dihapus');
    }





}
