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
            <img src="{{asset('images/pages/404.png')}}" class="img-fluid" alt="404 error">
            <h1 class="my-2 error-title">Halaman Tidak Ditemukan!</h1>
            <p>
              Kami tidak menemukan halaman yang anda cari.
            </p>
            <a href="{{ url('/') }}" class="btn btn-primary round glow mt-2">KEMBALI</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- not authorized end -->
@endsection
