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
        @include('template.navigation')
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
        @include('template.footer')

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
