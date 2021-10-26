<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function showProducts()
    {
        $products = Products::where("user_id", Auth::id())->get();

        return view("products")->with("products", $products);
    }

    public function createProduct(Request $request)
    {
        Products::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
            'description' => $request->description,
            'price' => $request->price,
        ]);
        return redirect()->back();
    }
}
