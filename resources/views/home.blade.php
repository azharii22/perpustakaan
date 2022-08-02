@extends ('layouts.siswa')

@section ('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">SMP Negeri Unggulan Sindang</h2>
          <p data-aos="fade-up" data-aos-delay="100">Facere distinctio molestiae nisi fugit tenetur repellat non praesentium nesciunt optio quis sit odio nemo quisquam. eius quos reiciendis eum vel eum voluptatem eum maiores eaque id optio ullam occaecati odio est possimus vel reprehenderit</p>

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">
          </div>
        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="{{ asset('assets/img/hero-img.svg')}}" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>
  </section><!-- End Hero Section -->

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
    </div><!-- End Breadcrumbs -->


@endsection