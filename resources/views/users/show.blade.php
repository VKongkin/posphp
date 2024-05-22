@extends('layouts.admin')

@section('title', 'Show User')
@section('content-header', 'Show User')


@section('content')
<div class="content-header">
  <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              User Details
            </div>
            <div class="card-body text-center" >
              <label for="last_name">{{ $user->last_name }}</label> 
              <label for="first_name">{{ $user->first_name }}</label> <br>
              <img src="{{ asset('storage/'.$user->profile_image) }}" width="100px"><br><br>
              <label for="email">Email:</label>
              {{ $user->email }} <br>
              <label for="create_at">Create At:</label>
              {{ $user->created_at->format('d-F-Y') }}<br><br>
              <a href="{{ route('users.edit', $user) }}" class="btn btn-primary" >Update User Information</a>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
@endsection