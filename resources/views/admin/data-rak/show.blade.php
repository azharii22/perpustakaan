@extends('layouts.admin')

@section('content')
<x-admin-page-component>
    @slot('currentPage')
        Detail Data Rak
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.data-rak.index') }}">Data Rak</a></li>
        <li class="breadcrumb-item active" aria-current="page">Daftar Buku Rak {{ $rak->name }}</li>
    @endslot

    @slot('actionButton')
        <h5 class="card-title">Detail Rak</h5>
    @endslot

    @slot('content')
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Nama Rak</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $rak->name }}" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control" disabled>{{ $rak->description }}</textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Total Buku</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $rak->buku->count() }}" disabled>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Total Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $kategori->count() }}" disabled>
            </div>
        </div>

        <hr>
        <h5 class="card-title">Daftar Buku</h5>

        <div class="card">
			<div class="card-header mb-5">
				{{-- <span class="card-title">Data Buku</span> --}}
			</div>
			<div class="card-body">
                <div class="row mb-3">
                    <div class="col-3">
                        <div class="form-group">
                            <label class="control-label">Tampilkan</label>
                            <select name="kategori_id" id="kategori_id" class="form-control">
                                <option selected value="">--Semua Kategori--</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
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
                        <th scope="col">Lokasi</th>
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
                url: "{{ route('admin.data-buku.index') }}",
                data: function (d) {
                    d.rak_id        = @json($rak->id);
                    d.kategori_id   = $('#kategori_id').val();
                }
            },
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
                {data: 'rak', name: 'rak'},
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

        $('#kategori_id').on('change', function () {
            datatable.draw();
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