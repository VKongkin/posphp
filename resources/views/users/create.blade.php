@extends('layouts.admin')

@section('title', 'Create User')
@section('content-header', 'Create User')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              Create User
            </div>
            <div class="card-body">
              
              <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="first_name" class="form-control">
                </div>

                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="last_name" class="form-control">
                </div>


                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" autocomplete="off" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" autocomplete="new-password" required>
                  
                </div>


                <div class="form-group">
                    <label for="profile_image">Profile Picture</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="profile_image">Choose file</label>

                        <input type="file" class="custom-file-input" name="profile_image" id="profile_image" accept="image/*">
                    </div>
                    @error('profile_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Create User</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
@endsection