<?php

namespace Transaction\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreditCardRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'card_number' => 'required|string',
            'expiration_date' => 'required|string',
            'cvv' => 'required|string',
        ];
    }
}
