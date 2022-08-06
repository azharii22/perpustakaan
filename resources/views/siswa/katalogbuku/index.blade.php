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
					<a href="{{ route('katalogbuku.index') }}" class="list-group-item list-group-item-action">Semua Kategori</a>
					@foreach ($kategori as $item)
						<a href="{{ url('/katalogbuku?kategori_id='.$item->id) }}" class="list-group-item list-group-item-action" aria-current="true">{{ $item->name }}</a> 
					@endforeach
				</div>
			</div>
			<div class="col-9">
				<div class="card">
					<div class="card-body">

						<form action="{{ route('katalogbuku.index') }}" method="GET">
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label class="col-form-control">Judul</label>
										<input type="text" name="req_judul" class="form-control" value="{{request()->get('req_judul')}}">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label class="col-form-control">Tahun</label>
										<input type="text" name="req_th" class="form-control" value="{{request()->get('req_th')}}">
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label class="col-form-control">Pengarang</label>
										<input type="text" name="req_pengarang" class="form-control" value="{{request()->get('req_pengarang')}}">
									</div>
								</div>
							</div>
							<div class="row my-2">
								<div class="col">
									<button type="submit" class="btn btn-primary">Cari</button>
								</div>
							</div>
						</form>
						<hr>

						<div class="row">
							<div class="col">

								<div class="row">
									@foreach ($buku as $item)
									<div class="col-3">
										<div class="card mb-4">
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

								{{ $buku->links("pagination::bootstrap-4") }}

							</div>
						</div>

					</div>
				</div>
			</div>
			
		</div>
    </div>
    

    @endsection