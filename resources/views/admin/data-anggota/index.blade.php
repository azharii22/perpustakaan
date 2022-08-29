@extends('layouts.admin')

@section('content')
<x-admin-page-component>
    @slot('currentPage')
        Data Anggota Tahun Akademik {{ $tahun->ta }}
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
    @endslot

    @slot('actionButton')
        <a href="{{ route('admin.data-anggota.create') }}" class="btn btn-primary" title="Tambah" data-toggle="tooltip">
            <i class="bi bi-plus mr-2"></i> Tambah Data Anggota
        </a>
        <button type="button" data-bs-toggle="modal" data-bs-target="#basicModal" class="btn btn-info text-white">
            <i class="bi bi-plus mr-2"></i> Import Data Anggota
        </button>
        <a href="{{ asset('format-import-data-anggota.xlsx') }}" class="btn btn-warning text-white" title="Tambah" data-toggle="tooltip">
            <i class="bi bi-download mr-2"></i> Download Template
        </a>
        <a href="{{ route('admin.update-kelas') }}" class="btn btn-secondary text-white" title="Tambah" data-toggle="tooltip">
            <i class="bi bi-arrow-up mr-2"></i> Perbaharui Kelas
        </a>
    @endslot

    @slot('content')    
        <div class="card">
            <div class="card-header mb-5">
                <span class="card-title">Data Anggota</span>
            </div>
            <div class="card-body">
                <x-datatable-component> 
                    @slot('columns')
                        <th>ID Anggota</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Email</th>
                        <th>No. HP</th>
                    @endslot
                </x-datatable-component>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Data Anggota</h5> 
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.import-data-anggota') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body"> 
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <input class="form-control" type="file" id="formFile" name="file">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"> 
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> 
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
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
                {data: 'username', name: 'username'},
                {data: 'name', name: 'name'},
                {data: 'kelas', name: 'kelas'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'status', name: 'status'},
                {data: 'action', name: 'action', orderable: false, seacrhable: false}
            ],
        });

        function destroy(e) {
            var url = '{{ route("admin.data-anggota.destroy", ":id") }}';
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