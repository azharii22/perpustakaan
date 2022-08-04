@extends('layouts.admin')

@section('content')
<x-admin-page-component>
	@slot('currentPage')
		Edit Data Buku
	@endslot

	@slot('breadcrumb')
    	<li class="breadcrumb-item"><a href="{{ route('admin.data-buku.index') }}">Data Buku</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Buku</li>
    @endslot

	@slot('actionButton')
		<h5 class="card-title">Edit Data Buku</h5>
	@endslot

	@slot('content') 
		<form action="{{ route('admin.data-buku.update', $buku->id)}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')
			<div class="row mb-2">
				<div class="col">
					<img src="{{ asset('assets/img/'.$buku->gambar) }}" alt="gambar" style="height: 200px; width: 150px;">
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputText" class="col-sm-2 col-form-label">Judul</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="judul" value={{ $buku->judul }}>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label">Kategori Buku</label>
				<div class="col-sm-10">
					<select name="data_kategori_id" class="form-select">
						<option selected disabled hidden>--Pilih Kategori Buku--</option>
						@foreach ($kategori as $item)	
						<option value="{{ $item->id }}" @if($buku->data_kategori_id === $item->id) selected @endif>{{ $item->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputNumber" class="col-sm-2 col-form-label">Jumlah Buku</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="jumlah" value="{{ $buku->jumlah }}">
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label">Lokasi Buku</label>
				<div class="col-sm-10">
					<select name="data_rak_id" class="form-select">
						<option selected disabled hidden>--Pilih Rak--</option>
						@foreach ($rak as $item)	
						<option value="{{ $item->id }}" @if($buku->data_rak_id === $item->id) selected @endif>{{ $item->name }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputPassword" class="col-sm-2 col-form-label">Pengarang</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="pengarang" value="{{ $buku->pengarang }}">
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputNumber" class="col-sm-2 col-form-label">Penerbit</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="penerbit" value="{{ $buku->penerbit }}">
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputNumber" class="col-sm-2 col-form-label">Tahun Terbit</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="th_terbit" value="{{ $buku->th_terbit }}">
				</div>
			</div>
			<div class="row mb-3">
				<label for="inputNumber" class="col-sm-2 col-form-label">Deskripsi</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="deskripsi">{{ $buku->deskripsi }}</textarea>
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
			  <a href="{{ route('admin.data-buku.index') }}" class="btn btn-secondary">Cancel</a>
			</div>
		  </div>
	
		</form>
  	@endslot
</x-admin-page-component>
@endsection
