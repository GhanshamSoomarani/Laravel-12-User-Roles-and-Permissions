@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Contracts</h2>

        {{-- Only users with contract-create permission can see this --}}
        @can('contract-create')
            <a href="{{ route('contracts.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Create Contract
            </a>
        @endcan
    </div>

    {{-- Flash message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Detail</th>
                <th>Created At</th>
                <th width="180px">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contracts as $contract)
                <tr>
                    <td>{{ $contract->name }}</td>
                    <td>{{ Str::limit($contract->detail, 50) }}</td>
                    <td>{{ $contract->created_at->format('d M Y') }}</td>
                    <td>
                        @can('contract-list')
                            <a href="{{ route('contracts.show', $contract->id) }}" class="btn btn-primary btn-sm">
                                View
                            </a>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No contracts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
