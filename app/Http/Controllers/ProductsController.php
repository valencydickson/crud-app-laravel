<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function showProducts()
    {
        $products = Products::all();

        return view("products")->with("products", $products);
    }

    public function createProduct(Request $request)
    {
        Products::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect()->back();
    }
}
