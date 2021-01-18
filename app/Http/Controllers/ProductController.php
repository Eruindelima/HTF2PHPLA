<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
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
        $product->user_id = Auth::id();

        //imagem upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalname().strtotime("now")).".".$extension;

            $request->image->move(public_path('/assets/img/productimage'), $imageName);

            $product->image = $imageName;
        }

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

        //imagem upload
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalname().strtotime("now")).".".$extension;

            $request->image->move(public_path('/assets/img/productimage'), $imageName);

            $product->product = $imageName;
        }

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

    public function sendedOrder()
    {
        $orders = DB::table('product_order')
        ->join('products', 'product_order.prod_id', '=', 'products.id')
        ->join('users as dono', 'products.user_id', '=', 'dono.id')
        ->join('users as donatario', 'product_order.user_id', '=', 'donatario.id')
        ->select('product_order.id as order', 'products.name_prod', 'products.qtd_box', 'dono.name as doador', 'donatario.name as donatario')
        ->where('dono.id', Auth::id())
        ->get();

        return view('pages.orders.index')->with('orders', $orders);
    }

    public function receivedOrder()
    {
        $orders = DB::table('product_order')
        ->join('products', 'product_order.prod_id', '=', 'products.id')
        ->join('users as dono', 'products.user_id', '=', 'dono.id')
        ->join('users as donatario', 'product_order.user_id', '=', 'donatario.id')
        ->select('product_order.id as order', 'products.name_prod', 'products.qtd_box', 'dono.name as doador', 'donatario.name as donatario')
        ->where('donatario.id', Auth::id())
        ->get();

        return view('pages.orders.index')->with('orders', $orders);
    }
}
