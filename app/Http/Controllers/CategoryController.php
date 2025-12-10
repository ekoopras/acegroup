<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = category::all();
        return view('resource.categories.index', compact('categories'));
    }

    public function create(){
        return view('resource.categories.create');
    }

    public function store(Request $request){
        $request->validate(['name' => 'required']);
        Category::create($request->all());

        return redirect()->route('resource.categories.index');
    }
}
