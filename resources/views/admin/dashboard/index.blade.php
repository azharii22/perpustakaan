@extends('layouts.admin')

@section('content')
 

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-6">
          <div class="row">

            <!-- Data Peminjaman Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Peminjaman</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-apps-2-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>0</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Data Peminjaman Card -->

            <!-- Data Pengembalian Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Jumlah Pengembalian</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-apps-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>0</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Pengembalian Card -->

                        <!-- Koleksi Buku Card -->
                        <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Koleksi Buku</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-apps-2-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>0</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Koleksi Buku Card -->

        </div><!-- End Right side columns -->

      </div>
    </section>
@endsection