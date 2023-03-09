<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(request $request, $id = null)
    {
        $categories = Category::all();
        //metode pagination digunakan untuk meminimalisir penampilan item pada halaman yg akan menampilkan banyak item
        //setelah itu aktifkan page to page pada index.blade.php agar pagination bisa di next to next
        $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->paginate(6);
        return view('shop.index', compact('products', 'categories','id'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $products =Product::where('category_id', $id)->paginate(6);
        return view('shop.index', compact('products', 'categories', 'id'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('shop.show', compact('product'));
    }

}
