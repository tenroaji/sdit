<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Islamic Boarding School System</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.2/components/teams/team-1/assets/css/team-1.css" />
    <link rel="stylesheet"
        href="https://unpkg.com/bs-brain@2.0.2/components/footers/footer-3/assets/css/footer-3.css" />
    <!-- Tambahkan link ke file CSS Anda -->
</head>

<body data-bs-spy="scroll" data-bs-target="#navbarNav" data-bs-offset="56">
    <!-- Menambahkan atribut data-bs-spy untuk scrollspy -->
    <div class="container-fluid">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('images/logo alfahri.png') }}" alt="Company Logo" width="80rem"
                        class="d-inline-block align-text-top img-fluid" />
                    <div class="d-flex flex-column ms-2">
                        <span>Pesantren Multi Dimensi</span>
                        <span class="fw-bold">Alfakhriyah Makassar</span>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('berita') }}">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pesantren') }}">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pendaftaran') }}">Pendaftaran Calon Santri</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://perumdautama.com/admin">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn bg-success rounded-pill text-white" href="#cta">Hubungi Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <section>
        </section>
        <section class="banner-section">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('images/' . $staticInfo->banner4) }}" class="img-fluid banner-image"
                            alt="Banner Image">
                        {{-- <div class="banner-text">
                            <h1>Selamat Hari Santri</h1>
                            <p>22 October</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        <section id="Informasi Pendaftaran" class="py-5">
            {{-- Coba blade --}}

            <div class="container overflow-hidden">
                <div class="text-toform">
                    <!-- <h2>Menyambut Masa Depan Cerah Generasi Muda Muslim Indonesia.</h2> -->
                    <a class="btn bg-success rounded-pill text-white" href="#registration-form">Form
                        Pendaftaran</a>
                </div>
                <p>{!! $staticInfo->aturan_daftar ?? 'Tidak ada aturan pendaftaran yang tersedia.' !!}</p>
                <div class="text-toform">
                    <!-- <h2>Menyambut Masa Depan Cerah Generasi Muda Muslim Indonesia.</h2> -->
                    <a class="btn bg-success rounded-pill text-white" href="#registration-form">Form
                        Pendaftaran</a>
                </div>
                <p>{!! $staticInfo->aturan_pondok ?? 'Tidak ada aturan pondok yang tersedia.' !!}</p>
            </div>

        </section>
        <!-- Form Pendaftaran Santri Baru -->
        <section id="registration-form" class="py-5  bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Form Pendaftaran Santri Baru</h2>


                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($periodes->isEmpty())
                    <p class="text-center mb-3 text-success">Belum ada Penerimaan Santri Baru pada tanggal ini.</p>
                @else
                    <!-- Formulir -->
                    <form method="POST" action="{{ route('pendaftaran.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- periode -->
                        <div class="mb-3">
                            <label for="periodependaftaran_id" class="form-label">Periode Pendaftaran:</label>
                            <select class="form-select" id="periodependaftaran_id" name="periodependaftaran_id"
                                required>
                                @foreach ($periodes as $periode)
                                    <option value="{{ $periode->id }}">{{ $periode->tahun }} -
                                        {{ $periode->strata->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Strata -->

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun:</label>
                            <input type="text" class="form-control" id="tahun" name="tahun">
                        </div>
                        <div class="mb-3">
                            <label for="strata_id" class="form-label">Jenjang:</label>
                            <input type="text" class="form-control" id="strata_id" name="strata_id">
                        </div> --}}

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="mb-3">
                            <label for="tempat-lahir" class="form-label">Tempat Lahir:</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="mb-3">
                            <label for="tanggal-lahir" class="form-label">Tanggal Lahir:</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>

                        <!-- Asal Sekolah -->
                        <div class="mb-3">
                            <label for="asal_sekolah" class="form-label">Asal Sekolah:</label>
                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah">
                        </div>

                        <!-- Lulus Tahun -->
                        <div class="mb-3">
                            <label for="lulus_tahun" class="form-label">Lulus Tahun:</label>
                            <input type="text" class="form-control" id="lulus_tahun" name="lulus_tahun">
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender:</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <!-- No Telpon / WA -->
                        <div class="mb-3">
                            <label for="no-telpon" class="form-label">No Telpon / WA:</label>
                            <input type="tel" class="form-control" id="no_telpon" name="no_telpon">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <!-- Foto -->
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto:</label>
                            <input type="file" class="form-control" id="foto" name="foto"
                                accept="image/*">
                        </div>

                        <!-- Ijasah -->
                        <div class="mb-3">
                            <label for="ijasah" class="form-label">Ijasah:</label>
                            <input type="file" class="form-control" id="ijasah" name="ijasah"
                                accept="image/*">
                        </div>

                        <!-- Kartu Keluarga -->
                        <div class="mb-3">
                            <label for="kartu_keluarga" class="form-label">Kartu Keluarga:</label>
                            <input type="file" class="form-control" id="kartu_keluarga" name="kartu_keluarga"
                                accept="image/*">
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @endif
            </div>
        </section>
        <footer class="footer">

            <!-- Widgets - Bootstrap Brain Component -->
            <section class="py-4 py-md-5 py-xl-8 bg-light border-top">
                <div class="container overflow-hidden">
                    <div class="row gy-4 gy-lg-0">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="widget">
                                <h4 class="widget-title mb-4">Hubungi Kami !</h4>
                                <address class="mb-4">Pondok Pesantren Multi Dimensi Al Fakhriyah Jalan Sunu III No
                                    16 Suwangga Tallo makassar</address>
                                <p class="mb-1">
                                    <a class="link-secondary text-decoration-none"
                                        href="tel:+6282346902363">082346902363</a>
                                </p>
                                <p class="mb-0">
                                    <a class="link-secondary text-decoration-none"
                                        href="mailto:alfakhriyyahppm@gmail.com">alfakhriyyahppm@gmail.com</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title mb-4">Informasi Layanan</h4>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <a href="#!" class="link-secondary text-decoration-none">Pendaftaran
                                            Santri</a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#!" class="link-secondary text-decoration-none">Informasi
                                            Umum</a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#!" class="link-secondary text-decoration-none">Informasi
                                            Akademik</a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#!" class="link-secondary text-decoration-none">Informasi
                                            Asrama</a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="#!" class="link-secondary text-decoration-none">Berita
                                            Terbaru</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title mb-4">Tentang Kami</h4>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <a href="#!" class="link-secondary text-decoration-none">Tentang
                                            Yayasan</a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#!" class="link-secondary text-decoration-none">Hubungan
                                            Masyarakat</a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#!" class="link-secondary text-decoration-none">Biaya
                                            Sekolah</a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#!" class="link-secondary text-decoration-none">Peraturan
                                            Sekolah</a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="#!" class="link-secondary text-decoration-none">Peraturan
                                            Asrama</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="widget">
                                <h4 class="widget-title mb-4">Islamic Boarding School System (IBSSYS)</h4>
                                <p class="mb-4">Dapatkan data mutakhir santri dengan memiliki akun pada aplikasi
                                    pesantren IBSSYS Al Fakhriyah.</p>
                                <form action="#!">
                                    <div class="row gy-4">
                                        <div class="col-12">
                                            <div class="input-group">
                                                <span class="input-group-text" id="email-newsletter-addon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-envelope"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                    </svg>
                                                </span>
                                                <input type="email" class="form-control" id="email-newsletter"
                                                    value="" placeholder="Email Address"
                                                    aria-label="email-newsletter"
                                                    aria-describedby="email-newsletter-addon" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">Daftar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Copyright - Bootstrap Brain Component -->
            <div class="bg-light py-4 py-md-5 py-xl-8 border-top border-light-subtle">
                <div class="container overflow-hidden">
                    <div class="row gy-4 gy-md-0">
                        <div class="col-xs-12 col-sm-6 col-md-4 order-0 order-md-0">
                            <div class="footer-logo-wrapper text-center text-sm-start">
                                <a href="#!">
                                    <img src="{{ asset('images/logo alfahri.png') }}" alt="" width="75"
                                        height="97">
                                </a>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-4 order-2 order-md-1">
                            <div class="footer-copyright-wrapper text-center">
                                &copy; 2023. All Rights Reserved.
                            </div>
                            <div class="credits text-secondary text-center mt-2 fs-7">
                                Built by <a href="https://ankejasa.com/"
                                    class="link-secondary text-decoration-none">Aneka Jasa</a> with <span
                                    class="text-primary">&#9829;</span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-4 order-1 order-md-2">
                            <ul class="nav justify-content-center justify-content-sm-end">
                                <li class="nav-item">
                                    <a class="nav-link link-dark" href="#!">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-dark" href="#!">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                            <path
                                                d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-dark" href="#!">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                            <path
                                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link link-dark" href="#!">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </footer>

        <!-- Bootstrap JS and Popper.js (Optional) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
        <script src="js/script.js"></script>
        <script async src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"
            integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous">
        </script>
        <!-- Tambahkan link ke file JavaScript Anda -->

    </div>
</body>

</html>