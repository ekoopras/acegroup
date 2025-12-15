<?php

namespace App\Http\Controllers;

use App\Models\ProductLaptop;
use Illuminate\Http\Request;

class ProductLaptopController extends Controller
{
    public function index(){
        $product_laptops = ProductLaptop::latest()->get();
        return view(
            'product.laptop.index', [
                'title' => 'Produk Laptop'
            ],
            compact('product_laptops')
        );
    }

    public function create(){
        return view('product.laptop.create', [
        'title' => 'Tambah Produk'
    ]);
    }

   public function store(Request $request)
{
    $request->validate([
    'barang' => 'required|string',
    'kondisi'  => 'required|in:Baru,Bekas',
    'harga'  => 'required',
]);

    $harga = str_replace('.', '', $request->harga);

    ProductLaptop::create([
        'barang' => $request->barang,
        'kondisi'  => $request->kondisi,
        'harga'  => $harga,
    ]);

    return redirect()->route('product-laptop.index')
        ->with('success', 'Data berhasil disimpan');
}

    public function edit(ProductLaptop $product_laptops)
    {
        return view('product.laptop.edit', [
                'title' => 'Edit Produk Laptop'
            ],
            compact('product_laptops')
        );
    }

    public function update(Request $request, ProductLaptop $product_laptops)
    {
        $request->validate([
            'barang' => 'required',
            'stock'  => 'required|numeric',
            'harga'  => 'required',
        ]);

        $product_laptops->update($request->all());

        return redirect()->route('product-laptop.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(ProductLaptop  $product_laptops)
    {
        $product_laptops->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

}
