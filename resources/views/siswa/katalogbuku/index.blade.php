@extends('layouts.siswa')

@section('content')

<!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Katalog Buku</h2>
              <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Katalog Buku</li>
          </ol>
        </div>
      </nav>
    </div>

    <div class="container">
		<div class="row my-4">

			<div class="col-3">
				<div class="list-group"> 
					@foreach ($kategori as $item)	
						<a href="#" class="list-group-item list-group-item-action" aria-current="true">{{ $item->name }}</a> 
					@endforeach
				</div>
			</div>
			<div class="col-9">
				<div class="card">
					<div class="card-body">
						
						<div class="row">
							<div class="col-3">
								<div class="form-group">
									<label class="col-form-control">Judul</label>
									<select name="" id="" class="form-control">
										<option value=""></option>
									</select>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<label class="col-form-control">Kategori</label>
									<select name="" id="" class="form-control">
										<option value=""></option>
									</select>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<label class="col-form-control">Tahun</label>
									<select name="" id="" class="form-control">
										<option value=""></option>
									</select>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<label class="col-form-control">Pengarang</label>
									<select name="" id="" class="form-control">
										<option value=""></option>
									</select>
								</div>
							</div>
						</div>
						<div class="row my-2">
							<div class="col">
								<button class="btn btn-primary">Cari</button>
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col">

								<div class="row">
									@foreach ($buku as $item)
									<div class="col-3">
										<div class="card">
											<div class="card-header">
												<img src="{{ asset('assets/img/buku/'.$item->gambar) }}" alt="" class="img-fluid" style="height: 220px;">
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col text-center">
														<a href="{{ route('katalogbuku.show', $item->id) }}" class="text-center">
															<b>{{ $item->judul }}</b>
														</a>
													</div>
												</div>
												<div class="row">
													<div class="col">
														<small>Pengarang: <b>{{ $item->pengarang }}</b></small>
													</div>
												</div>
												<div class="row">
													<div class="col">
														<small>Kategori: <b>{{ $item->kategori->name }}</b></small>
													</div>
												</div>
												<div class="row">
													<div class="col">
														<a href="{{ route('katalogbuku.show', $item->id) }}"><small>Detail >></small></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>						

							</div>
						</div>

					</div>
				</div>
			</div>
			
		</div>
    </div>
    

    @endsection