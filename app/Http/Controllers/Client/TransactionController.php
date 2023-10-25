<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Models\Transaction;
use App\Models\TrashType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(): View
    {
        $data['trashTypes'] = TrashType::all();

        return view('client.pages.transaction.index', $data);
    }

    public function store(StoreTransactionRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $trashType = TrashType::find($validated['trash_type']);

        $transaction = new Transaction;
        $transaction->trash_type_id = $trashType->id;
        $transaction->weight = $validated['weight'];
        $transaction->price = $trashType->price_kg;
        $transaction->total = $validated['total'];
        $transaction->save();

        return redirect()
            ->route('transaction.index')
            ->with('success', 'Transaction successful.\n You have earn ' . currencyFormat($validated['total']));
    }
}
