<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.products.index')->with('products', $products);
    }

    public function create()
    {
        return view('pages.products.create');
    }

    public function save(Request $request)
    {
        $product = new Product;

        $product->name_prod = $request->name_prod;
        $product->type_prod = $request->type_prod;
        $product->qtd_box = $request->qtd_box;
        $product->description = $request->description;
        $product->validate_prod = $request->validate_prod;

        if ($product->save()) {
            return redirect()->route('product.index');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.products.create')->with('product', $product);
    }
}
