@extends('layouts.siswa')

@section('content')

<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Profile</h2>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/">Home</a></li>
            <li>Profile</li>
          </ol>
        </div>
      </nav>
</div><!-- End Breadcrumbs -->

<div class="container">
	<div class="row my-4">
		<div class="col">

			<div class="card">
				<div class="card-header">
					Profile Saya
				</div>
				<div class="card-body">

					@if ($errors->any())
					<div class="alert alert-danger">
						<ul class="list-unstyled">
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					<form action="{{ route('profile-update') }}" method="POST" enctype="multipart/form-data">
						@csrf
				
						<div class="row mb-3">
							<label for="inputText" class="col-sm-2 col-form-label">ID Anggota</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="username" value="{{ auth()->user()->username }}" disabled>
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputText" class="col-sm-2 col-form-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="kelas" value="{{ auth()->user()->kelas }}">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputText" class="col-sm-2 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-10">
								<input type="date" class="form-control" name="tanggal_lahir" value="{{ auth()->user()->tanggal_lahir }}">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputText" class="col-sm-2 col-form-label">No. HP</label>
							<div class="col-sm-10">
								<input type="number" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputText" class="col-sm-2 col-form-label">Alamat</label>
							<div class="col-sm-10">
								<textarea name="address" class="form-control">{{ auth()->user()->address }}</textarea>
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputText" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
							</div>
						</div>
				
						<div class="row mb-3">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Submit</button>
								<button class="btn btn-secondary">Cancel</button>
							</div>
						</div>
				
					</form>
				</div>
			</div>
			
		</div>
	</div>
	<div class="row my-4">
		<div class="col">

			<div class="card">
				<div class="card-header">
					Ubah Password
				</div>
				<div class="card-body">
					<form action="{{ route('password-update') }}" method="POST">
						@csrf
						<div class="row mb-3">
							<label for="inputText" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputText" class="col-sm-2 col-form-label">Konfirmasi Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Submit</button>
								<button class="btn btn-secondary">Cancel</button>
							</div>
						</div>

					</form>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection