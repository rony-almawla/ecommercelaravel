<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function insert_product(Request $req)
    {

        $req->validate([
            "name" => "unique:products|min:6|max:8"
        ]);
        $product_2 = Product::insert([
            "name" => $req->productname,
            "description" => $req->description,
            "price" => $req->price,
        ]);
    }
    public function update_product(Request $req)
    {
        $productid = $req->productid;
        $product = Product::find(productid);

        $product_other_way = Product::where('id', $req->productid)->first();

        $product_other_way_2 = Product::where('id', $req->productid)->get()[0];
        $product->name = $req->name;
        $product->save();

        $product_other_way_2->update([
            "description" => $req->description ?? $product_other_way_2->description
        ]);


        return response()->json([
            "product1" => $product,
            "product2" => $product_other_way,
            "products" => $product_other_way_2
        ]);
    }
    public function get_product()

    {
        $products = Product::all();
        return response()->json([
            "products" => $products
        ]);
    }
    public function delete_product(Request $req)
    {
        $productId = $req->product_id;

        // Find the product by ID
        $product = Product::find($productId);

        // Check if the product exists
        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        // Delete the product
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully.']);
    }
}
