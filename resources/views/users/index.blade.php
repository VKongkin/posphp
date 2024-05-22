@extends('layouts.admin')

@section('title', 'User List')
@section('content-header', 'User List')
@section('content-actions')
<a href="{{route('users.create')}}" class="btn btn-primary">New User</a>
@endsection
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                Users
                </div>
                <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Profile Picture</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                        <td>{{ $user->id }}</td>
                        <td><img src="{{ asset('storage/'.$user->profile_image) }}" width="100px"></td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.show', $user) }}" class="btn btn-info"><i class="fa-solid fa-eye" style="color: #ffffff;"></i></a>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-primary" ><i class="fas fa-edit"></i></a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline">

                            @csrf
                            @method('DELETE')
                                <button class="btn btn-danger btn-delete" data-url="{{route('users.destroy', $user)}}"><i
                                    class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
