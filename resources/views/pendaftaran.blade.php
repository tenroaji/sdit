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
