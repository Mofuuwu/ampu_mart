<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function orders() {
        return $this->hasMany(Order::class, 'address_id');
    }
}
