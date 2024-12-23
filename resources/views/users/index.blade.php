@extends('layout.app')

@section('title', 'users')

@section('content')
    <div class="container mt-4">
        @if (auth()->user()->is_admin)
            <a href="{{ route('users.create') }}" class="btn btn-success mb-3">Add New User</a>
        @endif
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            @if (auth()->user()->is_admin)
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->password }}</td>
                                @if (auth()->user()->is_admin)
                                    <td> <a href="{{ route('users.edit', $user->id) }}"
                                            class="btn btn-outline-warning btn-sm">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                @endif
                        </tr> @empty <tr>
                                <td colspan="4">No users found</td>
                            </tr>
                        @endforelse
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to home page</a>
                    </tbody>
                </table>
            </div>
        @endsection
