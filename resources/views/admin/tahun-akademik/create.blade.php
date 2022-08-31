@extends('layouts.admin')

@section('content')
<x-admin-page-component>
    @slot('currentPage')
        Tambah Tahun Akademik
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.tahun-akademik.index') }}">Tahun Akademik</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Tahun Akademik</li>
    @endslot

    @slot('actionButton')
        <h5 class="card-title">Tambah Tahun Akademik</h5>
    @endslot

    @slot('content')
    <form action="{{ route('admin.tahun-akademik.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Tahun Akademik</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="ta" placeholder="2021/2022" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
                <select name="status" id="status" class="form-control">
                    <option value="1">Aktif</option>
                    <option value="0">Non-Aktif</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-secondary">Cancel</button>
            </div>
        </div>

    </form>
    @endslot
</x-admin-page-component>
@endsection
