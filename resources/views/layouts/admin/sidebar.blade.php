<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
	<ul class="sidebar-nav" id="sidebar-nav">

		<li class="nav-item">
			<a class="nav-link collapsed" href="{{ route('admin.dashboard') }}">
			<i class="bi bi-grid"></i>
			<span>Dashboard</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#" aria-expanded="true">
				<i class="bi bi-layout-text-window-reverse"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="charts-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
				<li> <a href="{{ route('admin.data-peminjaman.index') }}"> <i class="bi bi-circle"></i><span>Peminjaman</span> </a></li>
				<li> <a href="{{ route('admin.data-pengembalian.index') }}"> <i class="bi bi-circle"></i><span>Pengembalian</span> </a></li>
				<li> <a href="charts-echarts.html"> <i class="bi bi-circle"></i><span>Perpanjangan</span> </a></li>
			</ul>
		</li><!-- End Tables Nav -->

		<li class="nav-heading">Anggota</li>

		<li class="nav-item">
			<a class="nav-link collapsed" href="{{ route('admin.data-anggota.index') }}">
			<i class="bi bi-menu-button-wide"></i><span>Anggota</span>
			</a>
		</li>

		<li class="nav-heading">Master Data</li>

		<li class="nav-item">
			<a class="nav-link collapsed" href="{{ route('admin.data-buku.index') }}">
			<i class="bi bi-menu-button-wide"></i><span>Data Buku</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="{{ route('admin.data-kategori.index') }}">
			<i class="bi bi-menu-button-wide"></i><span>Data Kategori</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="{{ route('admin.data-rak.index') }}">
			<i class="bi bi-menu-button-wide"></i><span>Data Rak</span>
			</a>
		</li>
	</ul>
</aside>