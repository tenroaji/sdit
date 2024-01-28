<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/logo alfahri.png') }}" alt="Company Logo" width="80rem"
                class="d-inline-block align-text-top img-fluid" />
            <div class="d-flex flex-column ms-2">
             <span>SDIT MA'ARIF MAKASSAR</span>
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
                    <a class="nav-link" href="{{ route('galeri') }}">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pesantren') }}">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pendaftaran') }}">Pendaftaran Calon Santri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('admin')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn bg-success rounded-pill text-white" href="#cta">Hubungi Kami</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
