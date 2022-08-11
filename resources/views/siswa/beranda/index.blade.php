@extends('layouts.siswa')

@section('content')
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">SMP Negeri Unggulan</h2>
        
          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $totalUser }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Anggota</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $totalKategori }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Kategori Buku</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $totalBuku }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Kolekasi Buku</p>
              </div>
            </div>

          </div>
        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out" style="margin-top: 50px !important;">
          <img src="assets/img/hero.png" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>
  </section><!-- End Hero Section -->

  @endsection