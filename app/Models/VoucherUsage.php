<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherUsage extends Model
{
    /** @use HasFactory<\Database\Factories\VoucherUsageFactory> */
    use HasFactory;
    protected $guarded = [];
    public function order() {
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function voucher() {
        return $this->belongsTo(Voucher::class, 'voucher_id');
    }
}
