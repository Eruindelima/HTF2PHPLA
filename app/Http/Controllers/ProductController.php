<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.products.index');
    }

    public function create()
    {
        return view('pages.products.create');
    }

    public function save(Request $request)
    {
        $name = $request->input('name_prod');
        $type = $request->input('type_prod');
        $qtd_box = $request->input('qtd_box');
        $description = $request->input('description');
        $validate_prod = $request->input('validate_prod');
    }
}
