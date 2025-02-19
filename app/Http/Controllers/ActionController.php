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
        $quantity = $request->input('quantity');
    
        $cart = Cart::where('product_id', $product_id)
                    ->where('user_id', $user_id)
                    ->first();
    
        if ($cart) {
            $cart->quantity += $quantity;
            $cart->total_price += $price;
            $cart->save();
            
            return response()->json(['success' => true, 'message' => 'Cart updated successfully']);
        } else {
            $cart = Cart::create([
                'product_id' => $product_id,
                'user_id' => $user_id,
                'quantity' => $quantity,
                'total_price' => $price,
            ]);
    
            return response()->json(['success' => true, 'message' => 'Data added to cart successfully']);
        }
    }
    
}
