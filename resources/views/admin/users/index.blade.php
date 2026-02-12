@extends('layouts.admin')

@section('page-title', 'Users')
@section('title', 'Users')

@section('content')
    <div class="page-header mb-4">
        <div class="page-header-title">
            <h5 class="m-b-10">
                <i class="feather-users me-2"></i>Users
            </h5>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">Users</li>
            </ul>
        </div>

        <div class="ms-auto">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                <i class="feather-user-plus me-1"></i> Add User
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="card stretch stretch-full">
        <div class="card-body">
            @if($users->count())
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $index => $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $index }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ optional($user->role)->name ?? '-' }}</td>
                                    <td>
                                        @if($user->status ?? true)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            {{-- primary action: e.g. view --}}
                                            <a href="{{ route('admin.users.show', $user->id) }}"
                                                class="btn btn-outline-secondary btn-icon rounded-circle">
                                                <i class="feather-eye"></i>
                                            </a>

                                            {{-- secondary action: e.g. edit --}}
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="btn btn-outline-secondary btn-icon rounded-circle">
                                                <i class="feather-send"></i>
                                            </a>

                                            {{-- more actions dropdown --}}
                                            <div class="btn-group" role="group">
                                                <button id="userActions{{ $user->id }}" type="button"
                                                    class="btn btn-outline-secondary btn-icon rounded-circle dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="feather-more-horizontal"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="userActions{{ $user->id }}">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('admin.users.edit', $user->id) }}">
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                            onsubmit="return confirm('Delete this user?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $users->links() }}
                </div>
            @else
                <p class="mb-0">No users found.</p>
            @endif
        </div>
    </div>
@endsection