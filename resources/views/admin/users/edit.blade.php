@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit User</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Mobile</label>
                    <input type="text" name="mobile" value="{{ $user->mobile }}" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select name="role_id" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">
                    Update User
                </button>

            </form>

        </div>
    </div>

@endsection