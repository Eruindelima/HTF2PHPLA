<?php

namespace App\Http\Controllers;

use App\Events\NotificationEvent;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
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
        $products = Product::query()
        ->orderBy('name_prod')
        ->select('products.*', 'category.name')
        ->join('product_category', 'product_category.prod_id', '=', 'products.id')
        ->join('category', 'product_category.category_id', '=', 'category.id')
        ->get();

        $mensagem = $request->session()->get('mensagem');
        return view('pages.products.index', compact('products', 'mensagem'))->with('products', $products);
    }

    public function create(Request $request)
    {
        $category = Category::all();
        return view('pages.products.create', compact('category'));
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
            $product_category = new ProductCategory;
            $product_category->category_id = $product->type_prod;
            $product_category->prod_id = $product->id;
            $product_category->save();

            return redirect()->route('product.index');
        }
    }

    public function edit($id)
    {
        $product = Product::query()
        ->orderBy('name_prod')
        ->select('products.*', 'products.id as prod_id', 'category.*', 'category_id as category_id')
        ->join('product_category', 'product_category.prod_id', '=', 'products.id')
        ->join('category', 'product_category.category_id', '=', 'category.id')
        ->where('products.id', $id)
        ->first();

        $category = Category::all();
        return view('pages.products.create')
            ->with(['product' => $product, 'category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name_prod = $request->name_prod;
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
            $product_category = ProductCategory::where('prod_id', $id)->first();
            $product_category->category_id = $request->type_prod;
            $product_category->save();

            return redirect()->route('product.index');
        }
    }

    public function delete($id, Request $request)
    {
        $product = Product::find($id);

        $request->session()->flash('mensagem', "O produto {$product->name_prod} excluido com sucesso.");
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
        $order->client_id = Auth::id();
        $order->owner_id = $product->user_id;

        if ($order->save()) {

            $countNotification = Order::query()
                ->where('pendant', true)
                ->where('owner_id', $product->user_id)
                ->count();

            NotificationEvent::dispatch($countNotification, [
                'name' => auth()->user()->name,
                'route' => route("product.client.productDetails", ['id' => $order->id]),
                'createdAt' => $order->created_at,
                'photo' => asset("assets/img/profile/".auth()->user()->image)
            ]);
            $request->session()->flash('mensagem', "O produto {$product->name_prod} foi para sua lista de produtos recebidos acompanhe a pendência de seu pedido até que o mesmo seja liberado para retirada.");

            return redirect()->route('product.index');
        }
    }

    public function sendedOrder(Request $request)
    {
        $label = "Produtos Criados";
        $orders = DB::table('product_order')
        ->join('products', 'product_order.prod_id', '=', 'products.id')
        ->join('users as dono', 'products.user_id', '=', 'dono.id')
        ->join('users as donatario', 'product_order.client_id', '=', 'donatario.id')
        ->select('product_order.owner_id', 'product_order.id as order', 'products.name_prod', 'products.qtd_box', 'dono.name as doador', 'donatario.name as donatario', 'product_order.pendant')
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
        ->join('users as donatario', 'product_order.client_id', '=', 'donatario.id')
        ->select('product_order.owner_id', 'product_order.id as order', 'products.name_prod', 'products.qtd_box', 'dono.name as doador', 'donatario.name as donatario', 'product_order.pendant')
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
