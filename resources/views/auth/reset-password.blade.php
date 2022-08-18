@extends('layouts.siswa')

@section('content')
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
        <div class="row gy-4 justify-content-center mt-4">
            <div class="col-lg-8 text-center mt-4 mb-5">
                <h2 data-aos="fade-up my-4">
                    Perpustakaan <br>SMP Negeri Unggulan Sindang
                </h2>
                <form method="POST" action="{{ route('reset-password-post') }}" class="p-4 px-0 justify-content-center" >
                    @csrf

                    @if (Session::has('error'))
                    <div class="row mx-4">
                        <div class="col">
                            <div class="alert alert-danger">
                                <div>{{ Session::get('error') }}</div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row mb-3 mt-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-black">{{ __('ID Anggota / Username') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="col-form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    
                    <div class="row mb-5">
                        <div class="col-md-12 offset-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>

            {{-- <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                <img src="assets/img/hero.png" class="img-fluid mb-3 mb-lg-0" alt="">
            </div> --}}

        </div>
        </div>
    </section>
@endsection
