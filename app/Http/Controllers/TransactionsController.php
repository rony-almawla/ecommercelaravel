<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function insert_transaction(Request $req)
    {

        $req->validate([
            "transactionid" => "unique:transactions|min:4|max:8"
        ]);
        $transaction_2 = User::insert([
            "transactionid" => $req->transactionid,
            "quantity" => $req->quantity,
            "amount" => $req->amount,
        ]);
    }
    public function get_transaction()

    {
        $transactions = Product::all();
        return response()->json([
            "transactions" => $transactions
        ]);
    }
}
