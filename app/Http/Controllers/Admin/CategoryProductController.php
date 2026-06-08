<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function index()
    {
        logger('CATEGORY INDEX '.microtime(true));
        $categories = CategoryProduct::latest()->get();
        return view('admin.category', compact('categories'));
    }

    public function store(Request $request)
    {
        logger('STORE CATEGORY');
        $request->validate(['name' => 'required|string|max:100']);
        
        CategoryProduct::create(['name' => $request->name]);
        
        return back()->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        CategoryProduct::findOrFail($id)->delete();
        
        return back()->with('success', 'Kategori berhasil dihapus!');
    }
}