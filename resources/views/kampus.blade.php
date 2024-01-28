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
        <section class="banner-section">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('images/' . $staticInfo->banner3) }}" class="img-fluid banner-image"
                            alt="Banner Image">
                        {{-- <div class="banner-text">
                            <h1>Selamat Hari Santri</h1>
                            <p>22 October</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>

        <section class="container mt-5">
            <div class="row">
                <!-- Tentang -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Tentang</h5>
                        </div>
                        <div class="card-body text-start">
                            {!! $staticInfo->tentang !!}
                        </div>
                    </div>
                </div>

                <!-- Sejarah -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Sejarah</h5>
                        </div>
                        <div class="card-body text-start">
                            {!! $staticInfo->sejarah !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Visi -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Visi</h5>
                        </div>
                        <div class="card-body text-center">
                            {!! $staticInfo->visi !!}
                        </div>
                    </div>
                </div>

                <!-- Misi -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Misi</h5>
                        </div>
                        <div class="card-body text-start">
                            {!! $staticInfo->misi !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Struktur Organisasi -->
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Struktur Organisasi</h5>
                        </div>
                        <div class="card-body text-start">
                            {!! $staticInfo->struktur_organisasi !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-light py-3 py-md-5 py-xl-8">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        <h2 class="mb-4 display-5 text-center">Salam Dari Kami</h2>
                        <p class="text-secondary mb-5 text-center lead fs-4">Kami berikhtiar untuk dapat menjadi
                            pendidik, pengajar, pembimbing dan sekaligus sebagai orang tua santri dengan segenap
                            perhatian kami demi masa depan pendidikan santri.</p>
                        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                    </div>
                </div>
            </div>

            <div class="container overflow-hidden">
                <div class="row gy-4 gy-lg-0 gx-xxl-5">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0 text-center">
                                    <img class="img-fluid mx-auto" loading="lazy"
                                        src="{{ asset('/images/' . $staticInfo->fotopimpinan1) }}" alt=""
                                        style="height: 12rem; width: 10rem;">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">{{ $staticInfo->pimpinan1 }}</h4>
                                        <p class="text-secondary mb-0">{{ $staticInfo->jab1 }}</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0 text-center">
                                    <img class="img-fluid mx-auto" loading="lazy"
                                        src="{{ asset('/images/' . $staticInfo->fotopimpinan2) }}" alt=""
                                        style="height: 12rem; width: 10rem;">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">{{ $staticInfo->pimpinan2 }}</h4>
                                        <p class="text-secondary mb-0">{{ $staticInfo->jab2 }}</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0 text-center">
                                    <img class="img-fluid mx-auto" loading="lazy"
                                        src="{{ asset('/images/' . $staticInfo->fotopimpinan3) }}" alt=""
                                        style="height: 12rem; width: 10rem;">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">{{ $staticInfo->pimpinan3 }}</h4>
                                        <p class="text-secondary mb-0">{{ $staticInfo->jab3 }}</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                            <div class="card-body p-0">
                                <figure class="m-0 p-0 text-center">
                                    <img class="img-fluid mx-auto" loading="lazy"
                                        src="{{ asset('/images/' . $staticInfo->fotopimpinan4) }}" alt=""
                                        style="height: 12rem; width: 10rem;">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">{{ $staticInfo->pimpinan4 }}</h4>
                                        <p class="text-secondary mb-0">{{ $staticInfo->jab4 }}</p>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>







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
</body>

</html>
