  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

		<a href="/" class="logo d-flex align-items-center">
			<h1>Perpustakaan Unggulan Sindang</h1>
		</a>

		<i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
		<i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
		<nav id="navbar" class="navbar">
			<ul>
				<li><a href="/" class="active">Home</a></li>
				<li><a href="/tentang">About</a></li>
				<li><a href="/katalogbuku">Katalog Buku</a></li>
				@auth
				<li class="dropdown"><a href="#"><span>Sirkulasi</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
					<ul>
						<li><a href="{{ route('peminjaman-buku') }}">Peminjaman Buku</a></li>
						<li><a href="{{ route('pengembalian-buku') }}">Pengembalian Buku</a></li>
					</ul>
				</li>
				<li><a href="/profile">Profile</a></li>
				@endauth
				@auth
				<li>
					<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
						document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
				</li>
				@endauth
				@guest
					<li>
						<a href="{{ route('login') }}"><b>Login</b></a>
					</li>
				@endguest
			</ul>
		</nav>
    </div>
</header>