@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Manangement')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <users-component />
  </div>
</div>
@endsection