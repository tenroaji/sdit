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
                        <img src="{{ asset('images/' . $staticInfo->banner2) }}" class="img-fluid banner-image"
                            alt="Banner Image">
                        {{-- <div class="banner-text">
                            <h1>Selamat Hari Santri</h1>
                            <p>22 October</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
        <section id="newsheader" class="py-5">
            <div class="row mb-2">
                @foreach ($latestPosts as $post)
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start col-md-8">
                                <strong
                                    class="d-inline-block mb-2 text-{{ $post->category_color }}">{{ $post->jenis }}</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#">{{ $post->judul }}</a>
                                </h3>
                                <div class="mb-1 text-muted">{{ $post->created_at->format('M d') }}</div>
                                <!-- Menampilkan jenis dalam huruf tebal -->

                                <p class="card-text mb-auto">{{ $post->ringkasan }}</p>
                                <a href="#isiberita">Baca Selengkapnya</a>
                            </div>
                            <div class="col-md-4">
                                <img class="card-img-right flex-auto d-none d-md-block"
                                    style="width: 100%; height: auto;" src="{{ asset('/images/' . $post->foto) }}"
                                    alt="Card image cap">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- Coba blade --}}
        <section id="isiberita" class="container mt-5">
            @foreach ($latestPosts as $post)
                <div class="card mb-4">
                    <img src="{{ asset('/images/' . $post->foto) }}" class="card-img-top" alt="Gambar Berita">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->judul }}</h2>
                        <p class="card-text">{!! $post->isi !!}</p>
                        <p class="card-text"><small class="text-muted">Kategori: {{ $post->jenis }}</small></p>
                    </div>
                    <div class="card-footer text-muted">
                        Diposting oleh {{ $post->user->name }} pada {{ $post->created_at->format('d M Y H:i') }}
                        @if ($post->created_at != $post->updated_at)
                            | Diperbarui pada {{ $post->updated_at->format('d M Y H:i') }}
                        @endif
                    </div>
                </div>
            @endforeach
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
</body>

</html>
