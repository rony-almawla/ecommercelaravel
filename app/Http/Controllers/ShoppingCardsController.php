<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppindCardController extends Controller
{
    public function addToCart(Request $request, $productId) {
    $user = auth()->user();

    $order = $user->orders()->whereNull('completed_at')->first();
    if (!$order) {
        $order = $user->orders()->create(['total_amount' => 0]);
    }

    $product = Product::findOrFail($productId);
    $existingItem = $order->items()->where('product_id', $product->id)->first();
    if ($existingItem) {
        $existingItem->increment('quantity');
        $existingItem->update(['subtotal' => $existingItem->quantity * $product->price]);
    } else {

        $order->items()->create([
            'product_id' => $product->id,
            'quantity' => 1,
            'subtotal' => $product->price,
        ]);
    }

    $order->update(['total_amount' => $order->items()->sum('subtotal')]);

    return response()->json(['message' => 'Product added to cart successfully']);
    }
}
