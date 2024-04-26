<?php

namespace Transaction\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCreditCard extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'card_number',
        'expiration_date',
        'cvv',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
