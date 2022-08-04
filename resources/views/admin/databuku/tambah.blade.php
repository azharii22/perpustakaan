@extends('layouts.admin')

@section('content')
<x-admin-page-component>
	@slot('currentPage')
		Tambah Data Buku
	@endslot

	@slot('breadcrumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.data-buku.index') }}">Data Buku</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Buku</li>
    @endslot

	@slot('actionButton')
		<h5 class="card-title">Tambah Data Buku</h5>
	@endslot

	@slot('content') 
		<form action="{{ route('admin.data-buku.store')}}" method="POST" enctype="multipart/form-data">
		@csrf
			<div class="row mb-3">
				<label for="inputText" class="col-sm-2 col-form-label">Judul</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="judul">
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label">Kategori Buku</label>
				<div class="col-sm-10">
					<select name="data_kategori_id" class="form-select">
						<option selected disabled hidden>--Pilih Kategori Buku--</option>
						@foreach ($kategori as $item)	
						<option value="{{ $item->id }}">{{ $item->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputNumber" class="col-sm-2 col-form-label">Jumlah Buku</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="jumlah">
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label">Lokasi Buku</label>
				<div class="col-sm-10">
					<select name="data_rak_id" class="form-select">
						<option selected disabled hidden>--Pilih Rak--</option>
						@foreach ($rak as $item)	
						<option value="{{ $item->id }}">{{ $item->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputPassword" class="col-sm-2 col-form-label">Pengarang</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="pengarang">
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputNumber" class="col-sm-2 col-form-label">Penerbit</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="penerbit">
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputNumber" class="col-sm-2 col-form-label">Tahun Terbit</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="th_terbit">
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputNumber" class="col-sm-2 col-form-label">Deskripsi</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="deskripsi"></textarea>
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputNumber" class="col-sm-2 col-form-label">Gambar Buku</label>
				<div class="col-sm-10">
					<input class="form-control" type="file" id="formFile" name="gambar" accept=".jpg, .png, .jpeg">
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
