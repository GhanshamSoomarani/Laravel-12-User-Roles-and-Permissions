<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:contract-create'])->only(['create', 'store']);
        $this->middleware(['permission:contract-list'])->only(['index', 'show']);
    }

    public function index()
    {
        $contracts = Contract::latest()->get();
        return view('contracts.index', compact('contracts'));
    }

    public function create()
    {
        return view('contracts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'detail' => 'nullable|string',
        ]);

        Contract::create($request->only('name', 'detail'));

        return redirect()->route('contracts.index')
                         ->with('success', 'Contract created successfully.');
    }

    public function show(Contract $contract)
    {
        return view('contracts.show', compact('contract'));
    }
}
