@extends('layouts.siswa')

@section('content')

    <!-- ======= About ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/perpustakaan.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>VISI</h2>
              <p>Menjadi pusat pengelolaan dan penyebaran informasi guna mendukung pelaksanaan pembelajaraan, penelitian, dan pengabdian masyarakat.</p>
              <h2>MISI</h2>
              <p>Mendukung kurikulum SMP Negeri Unggulan sindang dengan menyediakan bahan-bahan informasi lengkap</p>
              <p>Mengutamakan pelayanan dengan menggunakan sistem otomasi kepada pemustaka sehingga para pemustaka menjadi kepuasan.</p>
              <p>Menciptakan suasana perpustakaan yang nyaman dan aman serta menyenangkan.</p>
              <p>Meningkatkan kualitas SDM para pengelola agar mampu memberikan pelayanan memuaskan.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="/home">Home</a></li>
            <li>About</li>
          </ol>
        </div>
      </nav>
    </div><!-- End About -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
          </div>
          <div class="col-lg-6 content order-last  order-lg-first">
            <h3>About Us</h3>
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <div>
                  <h5>Fungsi Perpustakaan</h5>
                  <p>Pendidikan</p>
                  <p>Rekreatif</p>
                  <p>Tempat belajar</p>
                  <p>Kelas alternatif</p>
                  <p>Sumber informasi</p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="200">
                <div>
                  <h5>Tujuan</h5>
                  <p>Menumbuh kembangkan minat baca tulis guru dan siswa</p>
                  <p>Mengenalkan teknologi informasi</p>
                  <p>Membiasakan akses informasi secara mandiri</p>
                  <p>Memupuk bakat dan minat</p>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

@endsecetion