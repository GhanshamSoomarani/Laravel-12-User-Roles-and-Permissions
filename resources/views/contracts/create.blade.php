@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Contract</h2>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contracts.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Contract Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter contract name" required>
        </div>

        <div class="form-group mb-3">
            <label>Contract Details</label>
            <textarea name="detail" class="form-control" rows="4" placeholder="Enter details">{{ old('detail') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Contract</button>
        <a href="{{ route('contracts.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
