@extends('layouts.admin')

@section('content')
<x-admin-page-component>
    @slot('currentPage')
        Tambah Data Rak
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.data-rak.index') }}">Data Rak</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Rak</li>
    @endslot

    @slot('actionButton')
        <h5 class="card-title">Tambah Data Rak</h5>
    @endslot

    @slot('content')
    <form action="{{ route('admin.data-rak.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Nama Rak</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control"></textarea>
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
