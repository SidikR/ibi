<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex flex-column align-items-center pt-md-0">
    <div class="w-100 d-md-flex mb-3 p-2 d-none" style=" background-color: var(--secondary-color)">
        <div class="container h-100 d-flex align-items-center justify-content-end gap-2 text-white">
            <div class="text-white" id="current-time"></div>
            <div class="social-links d-flex text-white">
                <a href="{{ getInfo()->twitter }}" target="_blank">
                    <i class="bi bi-twitter"></i>
                </a>
                <a target="_blank" href="{{ getInfo()->facebook }}"><i class="bi bi-facebook"></i></a>
                <a target="_blank" href="{{ getInfo()->instagram }}"><i class="bi bi-instagram"></i></a>
                <a target="_blank"
                    href="https://wa.me/{{ getInfo()->hp }}?text=Halo%20PT.%20Mitra%20Inti%20Service%2C%0ASaya%20[Nama%20Anda]%20dari%20[Nama%20Perusahaan%20Anda].%20Saya%20ingin%20mendapatkan%20informasi%20lebih%20lanjut%20mengenai%20layanan%20penyewaan%20forklift%20yang%20Anda%20tawarkan.%0A%0AApakah%20saya%20bisa%20mendapatkan%20penjelasan%20lebih%20lanjut%20dan%20jadwal%20pertemuan%20untuk%20mendiskusikan%20kebutuhan%20proyek%20kami%3F%20Terima%20kasih%20atas%20responsnya.%0A%0ASalam%2C%0A[Nama%20Anda]%0A[Kontak%20Telepon/Email]"
                    target="_blank"><i class="bi bi-whatsapp"></i></a>
                {{-- <a href=""><i class="bi bi-linkedin"></i></a> --}}
            </div>
        </div>
    </div>

    <div class="container d-flex align-items-center justify-content-between">

        <a href="{{ route('homepage') }}" class="logo d-flex align-items-center me-auto me-xl-0 gap-2">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img loading="lazy" src="{{ asset('storage/image/navbar.webp') }}" alt="logo dinas">
            {{-- @lazyimg(asset('storage/image/navbar.webp')) --}}
            <h1 class="text-center w-100 text-white">{{ getInfo()->title }}</h1>
        </a>

        <!-- Nav Menu -->
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('homepage') }}">Beranda</a></li>
                <li><a href="{{ route('tentang_kami.index') }}">Tentang Kami</a></li>
                <li class="dropdown has-dropdown"><a href="{{ route('product.index') }}"><span>Produk</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="mt-2 dd-box-shadow px-1">
                        @foreach (getProduct() as $product)
                            <li><a href="{{ route('product.detail', $product->slug) }}">{{ $product->title }}</a></li>
                        @endforeach

                        <hr>
                        <li class="p-0 mt-0"><a href="{{ route('product.index') }}">Produk Lainnya</a></li>
                    </ul>
                </li>
                {{-- <li class="dropdown has-dropdown"><a href="{{ route('layanan.index') }}"><span>Layanan</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="mt-2 dd-box-shadow px-1">
                        @foreach (getLayananModif() as $slug => $name)
                            <li><a href="{{ route('layanan.detail', $slug) }}">{{ $name }}</a></li>
                        @endforeach

                        <hr>
                        <li class="p-0 mt-0"><a href="{{ route('layanan.index') }}">Layanan Lainnya</a></li>
                    </ul>
                </li> --}}
                {{-- <li><a href="{{ route('galeri.index') }}">Galeri</a></li> --}}
                {{-- <li><a href="{{ route('testimoni.index') }}">Testimoni</a></li> --}}
                {{-- <li><a href="{{ route('proyek.index') }}">Proyek</a></li> --}}
                <li class="dropdown has-dropdown"><a href="#"><span>Media</span> <i
                            class="bi bi-chevron-down"></i></a>
                    <ul class="mt-2 dd-box-shadow px-1">
                        <li><a href="{{ route('galeri.index') }}">Galeri</a></li>
                        <li><a href="{{ route('berita.index') }}">Berita</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('careers.index') }}">Career</a></li>
                <li><a href="{{ route('contact.index') }}">Contact Us</a></li>
                @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="button" class="btn btn-sm btn-danger px-3 rounded-3 mx-3"
                            onclick="LogoutAlert('Apakah Anda yakin ingin logout?', 'Anda akan diarahkan ke halaman login.' , document.getElementById('logout-form'))"
                            title="Logout Now!"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        <button class="btn btn-primary btn-sm mx-3 rounded-3">Login</button>
                    </a>
                @endauth
            </ul>

            <script>
                $(document).ready(function() {
                    // Mendapatkan URL saat ini
                    var currentUrl = window.location.href;

                    // Loop melalui setiap tautan pada navigasi
                    $("ul li a").each(function() {
                        // Memeriksa apakah URL tautan ini cocok dengan URL saat ini
                        if ($(this).attr("href") === currentUrl) {
                            // Menambahkan kelas "active" jika cocok
                            $(this).addClass("active");
                        } else if (
                            currentUrl.endsWith("/") &&
                            $(this).attr("href") === "{{ route('homepage') }}"
                        ) {
                            // Kasus khusus untuk tautan "Home" jika URL saat ini adalah halaman beranda
                            $(this).addClass("active");
                        }
                    });
                });
            </script>

            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav><!-- End Nav Menu -->

    </div>
</header><!-- End Header -->
