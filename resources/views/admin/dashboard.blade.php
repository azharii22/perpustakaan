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
            <div class="col-12">
                <div class="row">
                    <div class="col">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Anggota <br><span>Total</span></h5>
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
                                <h5 class="card-title">Koleksi Buku <br><span>Total</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-apps-2-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalKoleksiBuku }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Buku <br><span>Total Tersedia</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-apps-2-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalBukuTersedia }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Peminjaman <br><span>Total Buku Dipinjam</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-apps-2-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalBukuDipinjam }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Terlambat <br><span>Total Peminjaman Terlambat</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-apps-2-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalPeminjamanTerlambat }}</h6>
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
                        <h5 class="card-title">Grafik <br><span>Kategori Buku Dipinjam</span></h5>
                        <canvas id="myChart" width="400" height="130"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Aktivitas Terakhir <br><span>5 Aktifitas Terakhir</span></h5>
                                <div class="activity">
                                    @foreach ($aktifitasaPeminjaman as $item)    
                                    <div class="activity-item d-flex">
                                        <div class="text-muted">{{ $item->created_at->diffForHumans() }} |</div> 
                                        <div class="activity-content"> {{ $item->buku->judul }} 
                                            <span class="fw-bold text-dark">
                                                @if($item->status ==='BARU')
                                                AKAN DIPINJAM
                                                @else
                                                {{ $item->status }}
                                                @endif
                                            </span> 
                                            {{ $item->user->name }}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('js')    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var labels      = @json($labels);
        var datasets    = @json($datasets);
        console.log(datasets);
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: datasets[0],
                    data: datasets[1],
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
                ticks: {
                    precision: 0
                },
                indexAxis: 'y',
                elements: {
                    bar: {
                        borderWidth: 2,
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush