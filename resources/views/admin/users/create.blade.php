@extends('layouts.admin')

@section('page-title', 'Add User')
@section('title', 'Add User')

@section('content')
    <div class="page-header mb-4">
        <div class="page-header-title">
            <h5 class="m-b-10">
                <i class="feather-user-plus me-2"></i>Add User
            </h5>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.users.index') }}">Users</a>
                </li>
                <li class="breadcrumb-item">Create</li>
            </ul>
        </div>
    </div>

    <div class="card stretch stretch-full">
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Mobile</label>
                    <input type="text" name="mobile" value="{{ old('mobile') }}"
                        class="form-control @error('mobile') is-invalid @enderror">
                    @error('mobile')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role_id" class="form-select @error('role_id') is-invalid @enderror">
                        <option value="">Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-light">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection