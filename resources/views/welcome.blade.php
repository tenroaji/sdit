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
                        <span>SDIT DARUL MA'ARIF</span>
                        <!--<span class="fw-bold">Alfakhriyah Makassar</span>-->
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
                            <a class="nav-link" href="{{ url("admin") }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn bg-success rounded-pill text-white" href="#hubungi-kami">Hubungi
                                Kami</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Home Section -->
        <section id="home">
            <div class="container-fluid p-0 image-container">
                <img src="{{ asset('images/latar-transformed.jpeg') }}" alt="Background Image"
                    class="img-fluid w-100" />
            </div>
            <div class="text-overlay">
                <!-- <h2>Menyambut Masa Depan Cerah Generasi Muda Muslim Indonesia.</h2> -->
                <a class="nav-link btn bg-success rounded-pill text-white" href="#hubungi-kami">Hubungi Kami</a>
            </div>
        </section>

        <section id="feature">
            <div class="b-example-divider"></div>

            <div class="container px-4 py-5" id="hanging-icons">
                <h2 class="pb-2 border-bottom">Apa Yang Kami Tawarkan</h2>
                <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                    <div class="col d-flex align-items-start">
                        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#toggles2" />
                            </svg>
                        </div>
                        <div>
                            <h2>Pembelajaran Unggulan</h2>
                            <p>Pendekatan pembelajaran yang inovatif dan efektif menggunakan metode-metode modern dan
                                tradisional, dikembangkan secara holistik melalui pengajaran yang memiliki lingkungan
                                belajar yang dinamis, memotivasi santri untuk mengeksplorasi pengetahuan dengan
                                kreatifitas mereka sendiri. </p>
                            <a href="#" class="btn bg-success text-white">
                                Lebih Lanjut ...
                            </a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#cpu-fill" />
                            </svg>
                        </div>
                        <div>
                            <h2>Pendidikan Berbasis Nilai</h2>
                            <p>Penanaman dan penguatan nilai-nilai agama Islam, moral, etika, dan karakter dalam proses
                                pembelajaran menjadi landasan utama untuk membentuk kepribadian santri, untuk
                                menginternalisasi dan mengaplikasikan nilai-nilai seperti kejujuran, disiplin dan
                                tanggung jawab dalam kehidupan sehari-hari.</p>
                            <a href="#" class="btn bg-success text-white">
                                Lebih Lanjut ...
                            </a>
                        </div>
                    </div>
                    <div class="col d-flex align-items-start">
                        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#tools" />
                            </svg>
                        </div>
                        <div>
                            <h2>Pengajaran Akhlakul Karimah</h2>
                            <p>Mendidik dan mengajarkan perilaku terpuji atau akhlak yang baik. Menekankan pada
                                pengembangan akhlak yang luhur dan bermoral tinggi sesuai dengan Islam. Menciptakan
                                lingkungan belajar yang membimbing siswa dalam mencapai kesempurnaan moral dan
                                spiritual, serta membentuk individu yang berakhlak mulia dan berkontribusi positif dalam
                                masyarakat. </p>
                            <a href="#" class="btn bg-success text-white">
                                Lebih Lanjut ...
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="imagemasonri">
            <div class="row" data-masonry='{"percentPosition": true }'>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/santriwati1.jpg') }}" class="card-img-top" alt="Image cap">

                        <div class="card-body">
                            <h5 class="card-title">Menuntut Ilmu</h5>
                            <p class="card-text">"Barangsiapa yang keluar untuk menuntut ilmu, maka ia berada di jalan
                                Allah hingga ia pulang," (HR Tirmidzi)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card p-3">
                        <figure class="p-3 mb-0">
                            <blockquote class="blockquote">
                                <p>Ilmu tidak akan dapat diraih kecuali dengan ketabahan.</p>
                            </blockquote>
                            <figcaption class="blockquote-footer mb-0 text-muted">
                                Imam Syafi'i <cite title="Source Title">Tentang Ilmu</cite>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/santriwati2.jpg') }}" class="bd-placeholder-img card-img-top"
                            width="100%" height="200" alt="Image cap">

                        <div class="card-body">
                            <h5 class="card-title">Pentingnya Ilmu</h5>
                            <p class="card-text">"Barangsiapa yang hendak menginginkan dunia, maka hendaklah ia
                                menguasai ilmu. Barangsiapa menginginkan akhirat, hendaklah ia menguasai ilmu. Dan
                                barang siapa yang menginginkan keduanya (dunia dan akhirat), hendaklah ia menguasai
                                ilmu." (HR Ahmad)</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card bg-success text-white text-white text-center p-3">
                        <figure class="mb-0">
                            <blockquote class="blockquote">
                                <p>Menuntut ilmu itu wajib atas setiap muslim”.


                                </p>
                            </blockquote>
                            <figcaption class="blockquote-footer mb-0 text-white">
                                HR. Ibnu Majah. <cite title="Source Title">Dinilai shahih oleh Syaikh Albani dalam
                                    Shahih wa Dha’if Sunan Ibnu Majah no. 224</cite>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Imam Al Ghazali</h5>
                            <p class="card-text">"Bersungguh - sungguhlah engkau dalam menuntut ilmu, jauhi lah
                                kemalasan dan kebosanan kerana jika tidak demikian engkau akan berada dalam bahaya
                                kesesatan."</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/santriwati3.jpg') }}" class="bd-placeholder-img card-img"
                            width="100%" height="260" alt="Card image">
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card p-3 text-end">
                        <figure class="mb-0">
                            <blockquote class="blockquote">
                                <p>Tri pusat pendidikan yang mewarnai anak didik adalah keluarga, sekolah dan
                                    masyarakat.</p>
                            </blockquote>
                            <figcaption class="blockquote-footer mb-0 text-muted">
                                Ki Hajar Dewantara <cite title="Source Title">Filosofi Pendidikan</cite>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mengamalkan Ilmu</h5>
                            <p class="card-text">Tujuan dari sebuah ilmu itu adalah untuk mengamalkannya, maka ilmu
                                yang hakiki adalah ilmu yang terefleksikan dalam kehidupannya, bukan ilmu yang hanya
                                bertengger di kepala.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section id="hubungi-kami" class="hubungi-kami py-5">
            <div class="container">
                <h2 class="mb-4">Hubungi Kami</h2>
                <form action="https://api.whatsapp.com/send" method="GET" target="_blank">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="text"
                            placeholder="Masukkan Nama Anda" required>
                    </div>

                    <div class="mb-3">
                        <label for="nomorWhatsApp" class="form-label">Nomor Pengirim:</label>
                        <input type="text" class="form-control" id="nomorWhatsApp" name="phone"
                            placeholder="Masukkan Nomor WhatsApp Anda" required>
                    </div>

                    <div class="mb-3">
                        <label for="pesanWhatsApp" class="form-label">Pesan:</label>
                        <textarea class="form-control" id="pesanWhatsApp" name="text" placeholder="Tulis pesan Anda di sini"
                            rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </section>


        <!-- Form Pendaftaran Santri Baru -->

        <!-- Footer 3 - Bootstrap Brain Component -->
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
