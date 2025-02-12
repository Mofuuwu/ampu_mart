<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $guarded = [];
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function carts() {
        return $this->hasMany(Cart::class, 'product_id');
    }
    public function order_items() {
        return $this->hasMany(OrderItem::class, 'product_id');
    }
}
