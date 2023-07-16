@extends('frontend.frontend_master')
@section('content')


<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Dashboard
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
      <button class="dropdown-item" type="button">profile</button>
      <button class="dropdown-item" type="button">order</button>
      <button class="dropdown-item" type="button">Some</button>
    </div>
  </div>

@endsection
