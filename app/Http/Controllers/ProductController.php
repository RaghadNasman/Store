<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $products = Product::all();
        // $categories = Category::where('user_id', Auth::id())->get();
        $categories = Category::where('user_id', Auth::id())
        ->pluck('name', 'id'); // مصفوفة [id => name]
        $products = Product::where('user_id', Auth::id())
        ->with(['category', 'user'])
        ->latest()
        ->paginate(3);
        return view('admin.products.index', compact('products','categories'));
    }
    public function createProduct()
    {
        // $categories = Category::all();
        $categories = Category::where('user_id', Auth::id())->get();
        return view('admin.products.create', compact('categories'));
    }
    public function storeProduct(Request $request)
    {
        $product  = new Product;
        $product->name = $request->name;
        $product->user_id = Auth::id();
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->save();
        return redirect()->back();
    }
    public function editProduct($id)
    {
        // $product = Product::find($id);
        $product = Product::findOrFail($id);
        // $categories = Category::all();
        $categories = Category::where('user_id', Auth::id())->get();
        $catID = $product->category;
        $categoryName = Category::findOrFail($catID);
        $this->authorize('update', $product);
        // return view('admin.products.edit', compact('product', 'categories'));
        return view('admin.products.edit', compact('product', 'categories', 'categoryName'));
    }
    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $this->authorize('update', $product);
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->save();
        return redirect('products');
    }
    public function destroyProduct($id)
    {
        // Product::find($id)->delete();
        $product = Product::findOrFail($id);
        $this->authorize('delete', $product);
        $product->delete();
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
