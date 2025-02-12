<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceHistory extends Model
{
    /** @use HasFactory<\Database\Factories\BalanceHistoryFactory> */
    use HasFactory;
    protected $guarded = [];
    public function user() {
        return $this->hasOne(User::class, 'user_id');
    }
}
