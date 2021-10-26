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

        $search = $request->search ?? "";

        return view("products")->with(["products" => $products, "search" => $search]);
    }

    public function createProduct(Request $request)
    {
        Products::create([
            'title' => $request->title,
            'user_id' => Auth::id(),
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $products = Products::where("user_id", Auth::id())->get();

        $search = $request->search ?? "";

        return view("products")->with(["products" => $products, "search" => $search]);

    }

    public function searchProduct(Request $request)
    {
        $search = $request->search;

        $validated = $request->validate([
            'search' => 'required',

        ]);

        $products = Products::where('title', 'LIKE', '%' . $search . '%')->get();
        return view("products")->with(["products" => $products, "search" => $search]);
    }
}
