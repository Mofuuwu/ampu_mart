<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ActionController extends Controller
{
    public function add_to_cart(Request $request)
    {
        Log::info($request->all());
        $user_id = $request->input('id');
        $product_id = $request->input('product');
        $price = $request->input('price');

        $cart = Cart::create([
            'product_id' => $product_id,
            'user_id' => $user_id,
            'quantity' => 1,
            'total_price' => $price
        ]);

        if ($cart) {
            return response()->json(['success' => true, 'message' => 'Data updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Data not found']);
    }
}
