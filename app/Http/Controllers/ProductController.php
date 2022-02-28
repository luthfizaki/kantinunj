<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\transaction;
class ProductController extends Controller
{
    public function index () {
        return view ('home', [
            'title' => 'Home',
            'categories' => Category::all(),
            'products' => Product::latest()->get(),
            'transactions' => transaction::where('status', 'on cart')->get(),
        ]);
    }

    public function kantins () {
        return view ('kantin', [
            'title' => 'All Foods',
            // 'categories' => Category::all(),
            'products' => Product::latest()->filter(request(['search']))
                                           ->filter(request(['category']))
                                           ->paginate(7)
                                           ->withQueryString(),
            'transactions' => transaction::where('status', 'on cart')->get()
        ]);
    }

    public function show_kantin (Category $category_kantin) {
        return view ('kantin', [
            'title' => $category_kantin->nama,
            'products' => $category_kantin->products->load('category', 'author'),
            'Category' => $category_kantin->nama,
            'transactions' => transaction::where('status', 'on cart')->get()
        ]);
    }

    public function show_product (Product $post) {
        return view ('product', [
            'title' => $post->nama,
            'categories' => Category::all(),
            'products' => Product::latest()->get(),
            'post' => $post,
            'transactions' => transaction::where('status', 'on cart')->get()
        ]);
    }
}
