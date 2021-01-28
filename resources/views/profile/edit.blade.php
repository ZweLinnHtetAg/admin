@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <user-edit-component userName="{{ Auth::user()->name }}" email="{{ Auth::user()->email }}" /> 
    </div>
  </div>
@endsection