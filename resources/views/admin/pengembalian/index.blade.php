@extends('layouts.admin')

@section('content')
<x-admin-page-component>
    @slot('currentPage')
        Data Pengembalian
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item active" aria-current="page">Data Pengembalian</li>
    @endslot

    @slot('actionButton')
        
    @endslot

    @slot('content')    
        <div class="card">
            <div class="card-header mb-5">
                <span class="card-title">Data Pengembalian</span>
            </div>
            <div class="card-body">
                <x-datatable-component> 
                    @slot('columns')
                        <th>Kode Peminjaman</th>
                        <th>Oleh</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
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
            ajax: "",
            columns: [
                {data: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'kode_peminjaman', name: 'kode_peminjaman'},
                {data: 'user', name: 'user'},
                {data: 'kode_buku', name: 'kode_buku'},
                {data: 'buku', name: 'buku'},
                {data: 'tanggal_pengambilan', name: 'tanggal_pengambilan'},
                {data: 'tanggal_pengembalian', name: 'tanggal_pengembalian'},
                {data: 'tanggal_pengembalian_aktual', name: 'tanggal_pengembalian_aktual'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, seacrhable: false, visible: false}
            ],
            "columnDefs": [
                {
                    "defaultContent": "-",
                    "targets": "_all"
                },
                {
                    "targets": 9,
                    "className": 'text-center'
                },
            ]
        });

        function destroy(e) {
            var url = '{{ route("admin.data-rak.destroy", ":id") }}';
            url = url.replace(':id', e);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url    : url,
                type   : "delete",
                success: function(data) {
                    $('#datatables').DataTable().ajax.reload();
                }
            })
        }
    </script>
@endpush