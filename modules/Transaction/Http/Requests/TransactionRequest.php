<?php

namespace Transaction\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|integer',
            'order_id' => 'required|integer',
            'callback' => 'required|string',
            'sign' => 'required|string',
            'name' => 'nullable|string',
            'phone' => 'nullable|string',
            'mail' => 'nullable|email',
            'description' => 'nullable|string',
            'allotment' => 'nullable|string',
            'callback_method' => 'nullable|integer',
            'wallet_hashid' => 'nullable|string',
            'national_code' => 'nullable|string',
            'card_number' => 'nullable|string',
        ];
    }
}
