<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{


    public function index(Request $request) {
        $categoryId = $request->category_id; // جلب معرف التصنيف من الطلب
        $categories = Category::all();

        if ($categoryId) {
            $products = Product::where('category', $categoryId)->get();
        } else {
            $products = Product::all();
        }


        return view('home.index', compact('products', 'categories', 'categoryId'));
    }

    // public function index () {
    //     $products = Product::all();
    //     $categories = Category::all();
    //     return view('home.index', compact('products', 'categories'));
    // }



}
