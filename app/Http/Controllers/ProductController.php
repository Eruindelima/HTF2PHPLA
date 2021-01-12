<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name_prod = $request->name_prod;
        $product->type_prod = $request->type_prod;
        $product->qtd_box = $request->qtd_box;
        $product->description = $request->description;
        $product->validate_prod = $request->validate_prod;

        if ($product->save()) {
            return redirect()->route('product.index');
        }
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product->delete()) {
            return redirect()->route('product.index');
        }
    }

    public function listClientProduct()
    {
        $products = Product::all();
        return view('pages.products.productList')->with('products', $products);
    }

    public function productOrder(Request $request, $id)
    {
        $order = new Order;

        $order->prod_id = $id;
        $order->user_id = Auth::id();

        if ($order->save()) {
            $product = Product::find($id);
            $product->delete();

            return redirect()->route('product.index');
        }
    }

    public function orderList() {    
        $orders = DB::table('product_order')
        ->join('products', 'product_order.prod_id', '=', 'products.id')
        ->join('users', 'product_order.user_id', '=', 'users.id')
        ->select('product_order.id as order', 'products.name_prod', 'products.qtd_box', 'users.name', 'users.email')
        ->get();
        return view('pages.orders.index')->with('orders', $orders);
    }

    public function orderByUser() {    
        $orders = DB::table('product_order')
        ->join('products', 'product_order.prod_id', '=', 'products.id')
        ->join('users', 'product_order.user_id', '=', 'users.id')
        ->select('product_order.id as order', 'products.name_prod', 'products.qtd_box', 'users.name', 'users.email')
        ->where('users.id', Auth::id())
        ->get();
        return view('pages.orders.index')->with('orders', $orders);
    }
}
