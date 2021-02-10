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

    public function index(Request $request)
    {
        $products = Product::query()->orderBy('name_prod')->get();
        $mensagem = $request->session()->get('mensagem');
        return view('pages.products.index', compact('products', 'mensagem'))->with('products', $products);
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

        $request->session()->flash('mensagem', "O produto {$product->name_prod} foi criado com sucesso.");

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

        $product = Product::find($id);

        $order->prod_id = $id;
        $order->user_id = Auth::id();
        $order->owner_id = $product->user_id;

        if ($order->save()) {
            $product->delete();
            return redirect()->route('product.index');
        }
    }

    public function sendedOrder(Request $request)
    {
        $label = "Produtos Criados";
        $orders = DB::table('product_order')
        ->join('products', 'product_order.prod_id', '=', 'products.id')
        ->join('users as dono', 'products.user_id', '=', 'dono.id')
        ->join('users as donatario', 'product_order.user_id', '=', 'donatario.id')
        ->select('product_order.id as order', 'products.name_prod', 'products.qtd_box', 'dono.name as doador', 'donatario.name as donatario', 'product_order.pendant')
        ->where('dono.id', Auth::id())
        ->orderByDesc('product_order.created_at')
        ->get();
        $isSuccessFull = $request->has('success') && $request->success;
        return view('pages.orders.index')
        ->with('orders', $orders)
        ->with('label', $label)
        ->with('isSuccessFull', $isSuccessFull);
    }

    public function receivedOrder()
    {
        $label = "Produtos Recebidos";
        $orders = DB::table('product_order')
        ->join('products', 'product_order.prod_id', '=', 'products.id')
        ->join('users as dono', 'products.user_id', '=', 'dono.id')
        ->join('users as donatario', 'product_order.user_id', '=', 'donatario.id')
        ->select('product_order.id as order', 'products.name_prod', 'products.qtd_box', 'dono.name as doador', 'donatario.name as donatario', 'product_order.pendant')
        ->where('donatario.id', Auth::id())
        ->get();

        return view('pages.orders.index')->with('orders', $orders)->with('label', $label);
    }

    public function productShow($id)
    {
        $product = Product::find($id);

        return view('pages.products.view')->with('product', $product);
    }

    public function productDetails($id)
    {
        $details = DB::table('product_order')
        ->join('products', 'product_order.prod_id', '=', 'products.id')
        ->join('users', 'products.user_id', '=', 'users.id')
        ->leftJoin('user_contact', 'products.user_id', '=', 'user_contact.user_id')
        ->select(
            'product_order.*',
            'products.*',
            'users.name as Doador',
            'user_contact.*',
        )
        ->where('product_order.id', $id)
        ->first();

        return view('pages.products.details')->with('product', $details);
    }

    public function approve(Order $order)
    {
        $order->pendant = false;
        $order->save();
        return redirect()->route('order.sended', ['success' => 1]);
    }
}
