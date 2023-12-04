@extends('layouts.layout1')

@section('content')

<style>
  .err-img{
    width: 100%;
    max-height: 75vh  !important;
  }

  .container{
    min-height: 100vh;
  }
</style>
  {{-- 404 error page --}}
    <div class="container d-flex flex-column justify-content-center align-items-center ">
        <img src="{{ asset('assets/images/errors/404-error-animate.svg') }}" alt="404" class=" img-fluid err-img">
        <p>Sorry, the page you are looking for could not be found.</p>
        <a href="/home" class=" btn btn-primary py-2 px-3">Back to home</a>
    </div>

@endsection
