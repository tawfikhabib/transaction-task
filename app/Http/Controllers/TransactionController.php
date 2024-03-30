<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

class TransactionController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all()->toArray();
        return response()->json($transactions);
    }


    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function getMockResponse(Request $request)
    {
        $status = $request->header('X-Mock-Status');

        if ($status === 'accepted') {
            return response()->json(['status' => 'accepted']);
        } elseif ($status === 'failed') {
            return response()->json(['status' => 'failed']);
        }
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->headers->set('X-Mock-Status','accepted');
        $mockapi = Request::create('/api/mock-response', 'GET');
        $response = Route::dispatch($mockapi);

        $responseBody = json_decode($response->getContent(), true);

        $transaction = new Transaction();
        $transaction->user_id = $request->userId;
        $transaction->amount = $request->amount;
        $transaction->transaction_id = uniqid();
        $transaction->status = $responseBody['status'];
        $transaction->save();

        return response()->json(['transaction_id' => $transaction->transaction_id])->header('Cache-Control', 'no-store');
    }


    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $transaction = Transaction::where('transaction_id', $request->transId)->first();

        if (!$transaction) {
            return response()->json(['error' => 'Transaction not found'], 404);
        }

        $transaction->status = $request->status;
        $transaction->save();

        return response()->json(['message' => 'Transaction updated successfully']);
    }

}
