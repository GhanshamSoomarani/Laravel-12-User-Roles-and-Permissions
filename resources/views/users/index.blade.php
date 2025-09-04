@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success mb-2" href="{{ route('users.create') }}">
                <i class="fa fa-plus"></i> Create New User
            </a>
        </div>
    </div>
</div>

@session('success')
    <div class="alert alert-success" role="alert">
        {{ $value }}
    </div>
@endsession

<table class="table table-bordered">
   <tr>
       <th>No</th>
       <th>Name</th>
       <th>Email</th>
       <th>Roles</th>
       <th>Status</th>
       <th>Last Login</th>
       <th width="280px">Action</th>
   </tr>
   @foreach ($data as $key => $user)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
               <label class="badge bg-success">{{ $v }}</label>
            @endforeach
          @endif
        </td>
        <td>
            @if($user->status)
                <span class="badge bg-success">Active</span>
            @else
                <span class="badge bg-danger">Inactive</span>
            @endif
        </td>
        <td>
            {{ $user->last_login_at ? $user->last_login_at->diffForHumans() : 'Never' }}
        </td>
        <td>
             <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}">
                 <i class="fa-solid fa-list"></i> Show
             </a>
             <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">
                 <i class="fa-solid fa-pen-to-square"></i> Edit
             </a>

             <!-- Optional: Toggle Status -->
             <form method="POST" action="{{ route('users.toggleStatus', $user->id) }}" style="display:inline">
                  @csrf
                  <button type="submit" class="btn btn-warning btn-sm">
                      {{ $user->status ? 'Deactivate' : 'Activate' }}
                  </button>
             </form>

             <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">
                      <i class="fa-solid fa-trash"></i> Delete
                  </button>
             </form>
        </td>
    </tr>
 @endforeach
</table>

{!! $data->links('pagination::bootstrap-5') !!}

@endsection
