<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MainConrtoller extends Controller
{
    public function index() {
        $products = Product::get();
        return view('index', compact('products'));
    }
    public function categories() {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }
    public function category($cod) {
        $category = Category::where('cod', $cod)->first();
//        $products = Product::where('category_id', $category->id)->get();
        return view('category', compact('category'));
    }
    public function product($category, $product = null) {
        return view('product', ['product' => $product]);
    }
}
