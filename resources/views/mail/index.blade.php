@extends('layouts.app', ['activePage' => 'mail', 'titlePage' => __('Send Mail')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="card col-md-6 offset-3">
            <mail-component />
        </div>
    </div>
  </div>
</div>
@endsection