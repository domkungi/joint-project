<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productlist()
    {
        $products = Product::all();

        return view('product.productlist' , ['products' => $products]);
    }
    public function create()
    {
        return view('product.create');
    }

    public function store()
    {
        Product::create([
            'name' =>  request('name'),
            'color' => request('color'),
            
        ]);

        return redirect('/productlist');
    }
}
