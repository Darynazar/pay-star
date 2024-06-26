<?php

namespace Transaction\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'amount',
        'order_id',
        'callback',
        'sign',
        'name',
        'phone',
        'mail',
        'description',
        'allotment',
        'callback_method',
        'wallet_hashid',
        'national_code',
        'card_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
