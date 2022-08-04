@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Anggota <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-apps-2-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalAnggota }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Buku <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-apps-2-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalBuku }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Peminjaman <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-apps-2-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalAnggota }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Terlambat <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-apps-2-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalAnggota }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Aktivitas Terakhir <span>| Bulan Ini</span></h5>
                                <div class="activity">
                                    <div class="activity-item d-flex">
                                        <div class="activite-label">32 min</div> 
                                        <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                                        <div class="activity-content"> Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-8">
                <div class="card"> 
                    <div class="card-body">
                        <h5 class="card-title">Laporan <span>| Grafik Peminjaman Bulan Ini</span></h5>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection