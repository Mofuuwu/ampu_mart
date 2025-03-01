<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $primaryKey = 'order_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function order_items() {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    public function voucher_usage() {
        return $this->belongsTo(VoucherUsage::class, 'order_id');
    }
}
