<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Islamic Boarding School System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" --}}
        {{-- integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" /> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.2/components/teams/team-1/assets/css/team-1.css" />
    <link rel="stylesheet"
        href="https://unpkg.com/bs-brain@2.0.2/components/footers/footer-3/assets/css/footer-3.css" />
    <!-- Tambahkan link ke file CSS Anda -->
    <link href="{{ asset('lightbox2/src/css/lightbox.css') }}" rel="stylesheet" />
    <style>
        * {
          box-sizing: border-box;
        }


        body {
          margin: 0;
          font-family: Arial;
        }

        .header {
          text-align: center;
          padding: 32px;
        }

        .row {
          display: -ms-flexbox; /* IE10 */
          display: flex;
          -ms-flex-wrap: wrap; /* IE10 */
          flex-wrap: wrap;
          padding: 0 4px;
        }

        /* Create four equal columns that sits next to each other */
        .column {
          -ms-flex: 25%; /* IE10 */
          flex: 25%;
          max-width: 25%;
          padding: 0 4px;
        }

        .column img {
          margin-top: 8px;
          vertical-align: middle;
          width: 100%;
        }

        /* Responsive layout - makes a two column-layout instead of four columns */
        @media screen and (max-width: 800px) {
          .column {
            -ms-flex: 50%;
            flex: 50%;
            max-width: 50%;
          }
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
          .column {
            -ms-flex: 100%;
            flex: 100%;
            max-width: 100%;
          }
        }
        </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbarNav" data-bs-offset="56">
    <!-- Menambahkan atribut data-bs-spy untuk scrollspy -->
    <div class="container-fluid">
        <!-- Navigation -->
        @include('template.navigation')
        <!-- Home Section -->
        {{-- <section class="banner-section">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('images/' . $staticInfo->banner2) }}" class="img-fluid banner-image"
                            alt="Banner Image">
                    </div>
                </div>
            </div>
        </section> --}}
        <section id="newsheader" class="py-5">

            <!-- Photo Grid -->
<div class="row justify-content-center">
    @foreach ($latestGaleri as $index => $post)
        @if ($index % 3 === 0)
            {{-- Start a new column after every 3 iterations --}}
            <div class="column">
        @endif


        <a href="{{ asset('images/'.$post->media) }}" data-lightbox="image-1" data-title="{{ $post->deskripsi }}">
         <img src="{{ asset('images/'.$post->media) }}" style="width:100%">
        </a>

        @if (($index + 1) % 3 === 0 || $index === count($latestGaleri) - 1)
            {{-- Close the current column after every 3 iterations or on the last iteration --}}
            </div>
        @endif
        {{-- @if (($index + 1) % 3 === 0 || $index === count($latestGaleri) - 1) --}}
        {{-- Display pagination link after every 3 iterations or on the last iteration --}}
        {{-- {{ $latestGaleri->links() }} --}}
        {{-- @endif --}}

    @endforeach

</div>
<div style=" display: flex; justify-content: center;margin-top: 20px;">
    {{ $latestGaleri->links() }}
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
        <script src="{{asset('lightbox2/dist/js/lightbox-plus-jquery.min.js')}}"></script>
        <!-- Or use the minified version -->
        <script src="{{ asset("lightbox2/js/lightbox.js") }}"></script>

        <!-- lightgallery plugins -->
        {{-- <script src="{{ asset("lightgallery/plugins/lg-thumbnail.umd.js") }}"></script>
        <script src="{{ asset("lightgallery/plugins/lg-zoom.umd.js") }}"></script> --}}
</body>

</html>
