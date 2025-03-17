<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index () {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
    public function createCategory() {
        return view('admin.categories.create');
    }

    public function storeCategory (Request $request) {
        $category  = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->back();
    }
    public function editCategory ($id) {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));

        // return view('admin.catigories.edit' , compact('category'));
    }
    public function updateCategory (Request $request, $id) {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('categories');
    }
    public function destroyCategory ($id) {
        Category::find($id)->delete();
        return redirect()->back();
    }
}
