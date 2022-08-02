@extends('layouts.admin')

@section('content')
<div class="card-body">
    <h5 class="card-title">Tambah Data Buku</h5>

    <!-- General Form Elements -->
    <form action="{{route ('update-databuku', $dataBuku->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
      <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="judul" value="{{$dataBuku->judul}}">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">Jenis Buku</label>
        <div class="col-sm-10">
          <select name="jb" class="form-select" value="{{$dataBuku->jb}}">
            <option selected>Pilih Jenis Buku</option>
            <option value="IPA">IPA</option>
            <option value="IPS">IPS</option>
            <option value="Bahasa">Bahasa</option>
            <option value="Sejarah">Sejarah</option>
            <option value="Biografi">Biografi</option>
            <option value="Kamus">Kamus</option>
            <option value="Undang-Undang">Undang-Undang</option>

          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputPassword" class="col-sm-2 col-form-label">Pengarang</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="pengarang" value="{{$dataBuku->pengarang}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">Penerbit</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="penerbit" value="{{$dataBuku->penerbit}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">Tahun Terbit</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" name="th_terbit" value="{{$dataBuku->th_terbit}}">
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">Deskripsi</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="deskripsi" style="height: 100px" value="{{$dataBuku->deskripsi}}"></textarea>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputNumber" class="col-sm-2 col-form-label">Gambar Buku</label>
        <div class="col-sm-10">
          <input class="form-control" type="file" id="formFile" name="gambar" accept=".jpg, .png, .jpeg" value="{{$dataBuku->gambar}}">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button class="btn btn-secondary">Cancel</button>
        </div>
      </div>

    </form>
    <!-- End General Form Elements -->

  </div>
@endsection
