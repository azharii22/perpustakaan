@extends('layouts.admin')

@section('content')
<x-admin-page-component>
	@slot('currentPage')
		Data Buku
	@endslot

	@slot('breadcrumb')
        <li class="breadcrumb-item active" aria-current="page">Data Buku</li>
    @endslot

	@slot('actionButton')
		<a href="{{ route('admin.data-buku.create') }}" class="btn btn-primary" title="Tambah" data-toggle="tooltip">
			<i class="bi bi-plus mr-2"></i> Tambah Data Buku
		</a>
	@endslot

	@slot('content')    
		<div class="card">
			<div class="card-header mb-5">
				<span class="card-title">Data Rak</span>
			</div>
			<div class="card-body">
				<x-datatable-component> 
					@slot('columns')
						<th scope="col">Cover</th>
                        <th scope="col">Kode Buku</th>
						<th scope="col">Judul</th>
						<th scope="col">Kategori</th>
						<th scope="col">Pengarang</th>
						<th scope="col">Penerbit</th>
						<th scope="col">Tahun</th>
                        <th scope="col">Jumlah</th>
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
                {data: 'cover', name: 'cover'},
                {data: 'kode_buku', name: 'kode_buku'},
				{data: 'judul', name: 'judul'},
				{data: 'kategori', name: 'kategori'},
                {data: 'pengarang', name: 'pengarang'},
				{data: 'penerbit', name: 'penerbit'},
				{data: 'th_terbit', name: 'th_terbit'},
                {data: 'jumlah', name: 'jumlah'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, seacrhable: false}
            ],
            columnDefs: [
                {
                    "targets": 9,
                    "className": "text-center",
                },
            ],
            dom: 'Bfrtip',
            buttons: [
                { 
                        extend: 'excel', 
                        className: 'btn btn-secondary', 
                        text: 'Download Excel',
                        messageTop: 'Data Buku',
                        exportOptions: {
                            columns: [2, 3]
                        }
                    },
            ]
        });

        function destroy(e) {
            var url = '{{ route("admin.data-buku.destroy", ":id") }}';
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