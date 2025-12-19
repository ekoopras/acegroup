<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();
        return view('category.index', [
            'title' => 'Kategori',
            'category' => $category
        ]);
    }

    public function create()
    {
        return view('category.create', [
            'title' => 'Tambah Kategori'
        ]);
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('category.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    // EDIT
    public function edit(Category $category)
    {
        return view('category.edit', [
            'title' => 'Edit Kategori',
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update($validated);

        return redirect()
            ->route('category.index')
            ->with('success', 'Data berhasil diupdate');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('category.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
