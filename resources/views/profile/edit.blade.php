@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <profile-edit-component userName="{{ Auth::user()->name }}" email="{{ Auth::user()->email }}" /> 
    </div>
  </div>
@endsection