@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div>
    
    <div class="row">
        <div class="col-8">
            
            <div class="card">
                <div class="card-header mb-3">
                    Edit Profile
                </div>
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="p-0 m-0" style="list-style: none;">
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(\Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <ul class="p-0 m-0" style="list-style: none;">
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif
                    @if(\Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="p-0 m-0" style="list-style: none;">
                            <li>{!! \Session::get('error') !!}</li>
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
				
						<div class="row mt-5">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Submit</button>
								<button class="btn btn-secondary">Cancel</button>
							</div>
						</div>
				
					</form>
                </div>
            </div>

        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    Edit Password
                </div>
                <div class="card-body">
                    <form action="{{ route('password-update') }}" method="POST">
						@csrf
						<div class="row mb-3">
							<label for="inputText" class="col-form-label">Password</label>
							<div class="col">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						<div class="row mb-3">
							<label for="inputText" class="col-form-label">Konfirmasi Password</label>
							<div class="col">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>
						<div class="row mb-3">
							<div class="col">
								<button type="submit" class="btn btn-primary">Submit</button>
								<button class="btn btn-secondary">Cancel</button>
							</div>
						</div>

					</form>
                </div>
            </div>
        </div>
    </div>

@endsection