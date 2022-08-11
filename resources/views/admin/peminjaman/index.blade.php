@extends('layouts.admin')

@section('content')
<x-admin-page-component>
    @slot('currentPage')
        Data Peminjaman
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item active" aria-current="page">Data Peminjaman</li>
    @endslot

    @slot('actionButton')
    @endslot
    
    @slot('content')   
        <div class="card">
            <div class="card-header mb-5">
                <span class="card-title">Data Peminjaman</span>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Tampilkan</label>
                            <select name="status" id="status" class="form-control">
                                <option selected value="">--Semua Status--</option>
                                <option value="BARU">BARU</option>
                                <option value="DIPINJAM">DIPINJAM</option>
                                <option value="DIKEMBALIKAN">DIKEMBALIKAN</option>
                                <option value="DIPERPANJANG">DIPERPANJANG</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-3">
                        <a href="#" class="btn btn-success"></a>
                    </div> --}}
                </div>
                <x-datatable-component> 
                    @slot('columns')
                        <th>Kode Peminjaman</th>
                        <th>Oleh</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Akan Diambil</th>
                        <th>Tanggal Pengambilan</th>
                        <th>Jadwal Pengembalian</th>
                        <th>Tanggal Pengembalian</th>
                    @endslot
                </x-datatable-component>
            </div>
        </div>
    @endslot
</x-admin-page-component>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        var datatable = $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.data-peminjaman.index') }}",
                data: function (d) {
                    d.status = $('#status').val();
                    console.log(d.status);
                }
            },
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
                {data: 'action', name: 'action', orderable: false, seacrhable: false}
            ],
            columnDefs: [
                {
                    "defaultContent": "-",
                    "targets": "_all"
                },
                {
                    "targets": 10,
                    "className": 'text-center'
                },
                {
                    "targets": 9,
                    "className": 'text-center'
                }
            ],
            dom: 'lBfrtip',
            buttons: [
                { 
                    extend: 'excel', 
                    className: 'btn btn-secondary mt-4', 
                    text: 'Download Excel',
                    messageTop: 'Data Peminjaman',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
                    }
                },
            ]
        });
        $('#status').change(function(){
            datatable.draw();
        });
    </script>
@endpush