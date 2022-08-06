@extends('layouts.siswa')

@section('content')

<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Sirkulasi</h2>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li>Sirkulasi</li>
            <li>Peminjaman</li>
          </ol>
        </div>
      </nav>
</div><!-- End Breadcrumbs -->

<div class="container">
	<div class="row my-4">
		<div class="col">

			<div class="card">
				<div class="card-header">
					Peminjaman Buku
				</div>
				<div class="card-body">
                    <table class="table" id="datatables">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 5%;">No</th>
                                <th>Kode Peminjaman</th>
                                <th>Oleh</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Akan Diambil</th>
                                <th>Tanggal Pengambilan</th>
                                <th>Jadwal Pengembalian</th>
                                <th>Tanggal Pengembalian</th>
                                <th scope="col" style="width: 10%;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@push('js')
    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script>
         var datatable = $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'kode_peminjaman', name: 'kode_peminjaman'},
                {data: 'user', name: 'user'},
                {data: 'kode_buku', name: 'kode_buku'},
                {data: 'buku', name: 'buku'},
                {data: 'tanggal_diambil', name: 'tanggal_diambil'},
                {data: 'tanggal_pengambilan', name: 'tanggal_pengambilan'},
                {data: 'tanggal_pengembalian', name: 'tanggal_pengembalian'},
                {data: 'tanggal_pengembalian_aktual', name: 'tanggal_pengembalian_aktual'},
                {data: 'status', name: 'status'},
            ],
            "columnDefs": [
                {
                    "defaultContent": "-",
                    "targets": "_all"
                },
                {
                    "targets": 9,
                    "className": 'text-center'
                }
            ]
        });
    </script>
@endpush