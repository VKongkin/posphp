@extends('layouts.admin')

@section('title', 'Update User')
@section('content-header', 'Update User')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              Edit User
            </div>
            <div class="card-body">

              <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control">
                </div>

                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                </div>

                <div class="form-group">
                  <label>Profile Picture</label>
                  <input type="file" name="profile_image" accept="image/*">
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
