@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $contract->name }}</h2>
    <p>{{ $contract->detail }}</p>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Error messages --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ✅ Only users can place bids --}}
    @role('user')
    <div class="card mb-4">
        <div class="card-header">Place Your Bid</div>
        <div class="card-body">
            <form action="{{ route('bids.store', $contract->id) }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label>Your Bid Amount</label>
                    <input type="number" step="0.01" name="amount" class="form-control" required>
                </div>
                <div class="form-group mb-2">
                    <label>Note (optional)</label>
                    <textarea name="note" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit Bid</button>
            </form>
        </div>
    </div>
    @endrole

    <h3>Bids</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>User</th>
                <th>Amount</th>
                <th>Note</th>
                <th>Placed At</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contract->bids as $bid)
                {{-- ✅ Show all bids if admin/manager, otherwise show only user's own --}}
                @if(auth()->user()->hasRole(['admin','manager']) || $bid->user_id == auth()->id())
                <tr>
                    <td>{{ $bid->user->name }}</td>
                    <td>${{ number_format($bid->amount, 2) }}</td>
                    <td>{{ $bid->note ?? '---' }}</td>
                    <td>{{ $bid->created_at->format('d M Y H:i') }}</td>
                </tr>
                @endif
            @empty
                <tr>
                    <td colspan="4">No bids yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('contracts.index') }}" class="btn btn-secondary mt-2">Back</a>
</div>
@endsection
