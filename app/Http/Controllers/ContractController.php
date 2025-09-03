<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContractController extends Controller
{
    /**
     * Apply permissions middleware.
     */
    function __construct()
    {
         $this->middleware('permission:contract-list|contract-create|contract-edit|contract-delete', ['only' => ['index','show']]);
         $this->middleware('permission:contract-create', ['only' => ['create','store']]);
         $this->middleware('permission:contract-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:contract-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $contracts = Contract::latest()->paginate(5);

        return view('contracts.index', compact('contracts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Contract::create($request->all());

        return redirect()->route('contracts.index')
                        ->with('success','Contract created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract): View
    {
        return view('contracts.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract): View
    {
        return view('contracts.edit', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $contract->update($request->all());

        return redirect()->route('contracts.index')
                        ->with('success','Contract updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract): RedirectResponse
    {
        $contract->delete();

        return redirect()->route('contracts.index')
                        ->with('success','Contract deleted successfully');
    }
}
