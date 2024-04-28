<?php

namespace Transaction\Http\Controllers;

use App\Http\Controllers\Controller;
use Transaction\Http\Requests\TransactionRequest;
use Transaction\Models\Transaction;
use Transaction\Services\TransactionService;

class TransactionController extends Controller
{
    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        $transactions = $this->transactionService->getAllTransactions();

        return response()->json($transactions);
    }

    public function show(Transaction $transaction)
    {
        return response()->json($transaction);
    }

    public function store(TransactionRequest $request)
    {
        $this->transactionService->createTransaction($request->validated());

        return redirect()->back(201)->with('success', 'created was successfully');

        //        return response()->json($transaction, 201);
    }

    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $updatedTransaction = $this->transactionService->updateTransaction($transaction, $request->validated());

        return response()->json($updatedTransaction);
    }

    public function destroy(Transaction $transaction)
    {
        $this->transactionService->deleteTransaction($transaction);

        return response()->json(null, 204);
    }
}
