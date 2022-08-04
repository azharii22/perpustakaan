@extends('layouts.admin')

@section('content')
<x-admin-page-component>
    @slot('currentPage')
        Edit Data Kategori
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.data-kategori.index') }}">Data Kategori</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Kategori</li>
    @endslot

    @slot('actionButton')
        <h5 class="card-title">Edit Kategori</h5>    
    @endslot

    @slot('content')
    <form action="{{ route('admin.data-kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Nama Kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" value="{{ $kategori->name }}">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea name="description" class="form-control">{{ $kategori->description }}</textarea>
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
