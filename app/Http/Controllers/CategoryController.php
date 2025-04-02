<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index () {
        // $categories = Category::all();
        // $categories = Category::where('user_id', Auth::id())->get();
        $categories = Category::where('user_id', Auth::id())
        ->latest()
        ->paginate(3);
        return view('admin.categories.index', compact('categories'));
    }
    public function createCategory() {
        return view('admin.categories.create');
    }

    public function storeCategory (Request $request) {
        $category  = new Category;
        $category->name = $request->name;
        $category->user_id = Auth::id();
        $category->save();
        return redirect()->back();
    }
    public function editCategory ($id) {
        $category = Category::findOrFail($id);
        $this->authorize('update', $category);
        return view('admin.categories.edit', compact('category'));

        // return view('admin.catigories.edit' , compact('category'));
    }
    public function updateCategory (Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $this->authorize('update', $category);
        $category->save();
        return redirect('categories');
    }
    public function destroyCategory ($id) {
        // Category::find($id)->delete();
        $category = Category::findOrFail($id);
        $this->authorize('delete', $category);
        $category->delete();
        return redirect()->back();
    }
}
