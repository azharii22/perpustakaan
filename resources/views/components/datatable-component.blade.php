
<div>    
    <table class="table" id="datatables">
        <thead>
            <tr>
                <th scope="col" style="width: 5%;">No</th>
                {{ $columns }}
                <th scope="col" style="width: 10%;">Status</th>
                <th scope="col" style="width: 15%;" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        
        </tbody>
    </table>

    @push('css')
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @endpush
    @push('js')
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    @endpush
</div>