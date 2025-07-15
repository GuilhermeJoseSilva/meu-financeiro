<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // GET /api/transactions
    public function index() {
        return Transaction::orderBy('date', 'desc')->get();
    }

    // POST /api/transactions
    public function store(Request $request) {
        $data = $request->validate([
            'type' => 'required|in:entrada,saida',
            'amount' => 'required|numeric',
            'category' => 'required|string|max:255',
            'reason' => 'nullable|string|max:255',
            'date' => 'required|date',
        ]);

        $transaction = Transaction::create($data);

        return $transaction;
    }

    public function destroy($id) {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return response()->json(['message', 'Transacao deletada com sucesso']);
    }
}
