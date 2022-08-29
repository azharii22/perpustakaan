@extends('layouts.admin')

@section('content')
<x-admin-page-component>
    @slot('currentPage')
        Tahun Akademik
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item active" aria-current="page">Tahun Akademik</li>
    @endslot

    @slot('actionButton')
        <a href="{{ route('admin.tahun-akademik.create') }}" class="btn btn-primary" title="Tambah" data-toggle="tooltip">
            <i class="bi bi-plus mr-2"></i> Tambah Tahun Akademik
        </a>
    @endslot

    @slot('content')    
        <div class="card">
            <div class="card-header mb-5">
                <span class="card-title">Tahun Akademik</span>
            </div>
            <div class="card-body">
                <x-datatable-component> 
                    @slot('columns')
                        <th>Tahun Akademik</th>
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
                {data: 'ta', name: 'ta'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, seacrhable: false}
            ],
        });

        function destroy(e) {
            var url = '{{ route("admin.tahun-akademik.destroy", ":id") }}';
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