<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Contract;
use Illuminate\Http\Request;

class BidController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:contract-bid'])->only(['store']);
    }

    public function store(Request $request, $contractId)
{
    $request->validate([
        'amount' => 'required|numeric|min:1',
        'note'   => 'nullable|string',
    ]);

    $existingBid = Bid::where('user_id', auth()->id())
                      ->where('contract_id', $contractId)
                      ->first();

    if ($existingBid) {
        return back()->withErrors(['You have already placed a bid for this contract.']);
    }

    Bid::create([
        'user_id'     => auth()->id(),
        'contract_id' => $contractId,
        'amount'      => $request->amount,
        'note'        => $request->note,
    ]);

    return back()->with('success', 'Bid placed successfully.');
}

}
