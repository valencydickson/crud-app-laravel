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
        return redirect("/")->with(["products" => $products, "search" => $search]);

    }

    public function searchProduct(Request $request)
    {

        $validated = $request->validate([
            'search' => 'required',
        ]);

        $search = $request->search;
        $products = Products::where('title', 'LIKE', '%' . $search . '%')->get();
        return redirect("/")->with(["products" => $products, "search" => $search]);
    }

    public function editProduct(Request $request)
    {
        $product = Products::firstWhere("id", $request->id);
        return view("editProduct")->with("product", $product);
    }

    public function createEditedProduct(Request $request)
    {
        Products::where("id", $request->id)->update(["title" => $request->title, "description" => $request->description, "price" => $request->price]);

        $products = Products::where("user_id", Auth::id())->get();
        $search = $request->search ?? "";
        return redirect("/")->with(["products" => $products, "search" => $search]);

    }

    public function deleteProduct(Request $request)
    {
        Products::where("id", $request->id)->delete();

        $products = Products::where("user_id", Auth::id())->get();
        $search = $request->search ?? "";
        return redirect("/")->with(["products" => $products, "search" => $search]);
    }
}
