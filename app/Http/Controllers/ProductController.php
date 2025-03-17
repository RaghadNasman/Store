<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::pluck('name', 'id'); // مصفوفة [id => name]

        return view('admin.products.index', compact('products', 'categories'));
    }
    public function createProduct()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }
    public function storeProduct(Request $request)
    {
        $product  = new Product;
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->save();
        return redirect()->back();
    }
    public function editProduct($id)
    {
        $product = Product::find($id);
        $catID = $product->category;
        $categoryName = Category::find($catID);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories', 'categoryName'));
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->save();
        return redirect('products');
    }
    public function destroyProduct($id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }

    // public function createProduct()
    // {
    //     $productName = $_POST['name'];
    //     $productQtt = $_POST['quantity'];
    //     $productPrice = $_POST['price'];
    //     $productCategory = $_POST['category'];
    //     $productDescription = $_POST['description'];
    //      Product::create([
    //     'name' => $productName,
    //      'quantity' => $productQtt,
    //      'price' => $productPrice,
    //      'category' => $productCategory,
    //      'description' => $productDescription
    //     ]);
    //     return redirect()->back();
    //     // return view('admin.products.create');

    // }

    // public function destroyProduct($id)
    // {
    //     Product::destroy($id);
    //     return redirect()->back();
    //     // return redirect('admin.products.index');
    // }
    // public function editProduct($id)
    // {

    //     $product = Product::where('id', $id)->first();
    //     return view('admin.products.edit', compact('product'));
    //     // $products = User::all();
    //     // return redirect()->back();
    // }

    // public function updateProduct()
    // {
    //     $id = $_POST['id'];
    //     Product::where('id', $id)->update([
    //     'name' => $_POST['name'],
    //      'quantity' => $_POST['quantity'],
    //      'price' => $_POST['price'],
    //      'category' => $_POST['category'],
    //      'description' => $_POST['description']
    //     ]);
    //     return redirect(to: 'admin/products');
    // }
}
