<?php

namespace Transaction\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Transaction\Models\Transaction;

class TransactionService
{
    public function getAllTransactions()
    {
        return Transaction::all();
    }

    public function createTransaction(array $data)
    {
        $data['callback'] = 'http://127.0.0.1:8000';

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer 0yovdk2l6e143',
        ])->post('https://core.paystar.ir/api/pardakht/create', $data);

        $data['user_id'] = Auth::user()->id;
        $data['sign'] = 'sksjk';

        Transaction::create($data);

        return $response;
    }

    public function updateTransaction(Transaction $transaction, array $data)
    {
        $transaction->update($data);

        return $transaction;
    }

    public function deleteTransaction(Transaction $transaction)
    {
        $transaction->delete();
    }
}
