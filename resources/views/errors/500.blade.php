@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Not Found')

@section('content')
  <!-- not authorized start -->
  <section class="row flexbox-container">
    {{--  <div class="col-xl-12 col-md-8 col-12">--}}
    <div class="col-xl-12 col-md-8 col-12">
      <div class="card bg-transparent shadow-none">
        <div class="card-content">
          <div class="card-body text-center bg-transparent miscellaneous">
            {{--          <img src="{{asset('images/pages/not-authorized.png')}}" class="img-fluid" alt="not authorized" width="400">--}}
            <img src="{{asset('images/pages/500.png')}}" class="img-fluid" alt="500 internal server error">
            <h1 class="mt-1 error-title">Internal Server Error!</h1>
            <p class="p-2">
              Restart the browser after clearing the cache and deleting the cookies. <br> Issues triggered by wrong file
              and directory permissions.
            </p>
            <a href="{{ url('/') }}" class="btn btn-primary round glow mt-2">KEMBALI</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- not authorized end -->
@endsection
