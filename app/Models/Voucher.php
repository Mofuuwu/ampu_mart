<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    /** @use HasFactory<\Database\Factories\VoucherFactory> */
    use HasFactory;
    protected $guarded = [];
    public function voucher_usages() {
        return $this->hasMany(VoucherUsage::class, 'voucher_id');
    }
}
