<?php

namespace Transaction\Services;

use Illuminate\Support\Facades\Auth;
use Transaction\Models\Transaction;

class TransactionService
{
    public function getAllTransactions()
    {
        return Transaction::all();
    }

    public function createTransaction(array $data)
    {
        $data['user_id'] = Auth::user()->id;

        return Transaction::create($data);
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
