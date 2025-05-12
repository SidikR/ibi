<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>IBI Lampung Selatan</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo-ibi.png') }}" type="image/x-icon" />
    @stack('styles')
</head>

<body>
    <div class="navbar">
        <div class="logo-title">
            <img src="{{ asset('assets/images/logo-ibi.png') }}" alt="Logo IBI">
            <strong>IBI Lampung Selatan</strong>
        </div>
        <div class="menu">
            <a href="/">Beranda</a>
            <div class="dropdown">
                <a href="#">Layanan</a>
                <div class="dropdown-content">
                    <a href="https://ibi.data-online.id" target="_blank">KTA Online</a>
                    <a href="https://app.bidan-delima.id/login" target="_blank">ODELIA</a>
                    <a href="{{ route('login') }}" target="_blank">App Ibilamsel</a>
                </div>
            </div>

            <a href="#">Media</a>
            <a href="#">Galeri</a>
            <a href="#">Pelatihan</a>
        </div>
    </div>

    <div class="hero">
        <h1>Membangun Profesionalisme Bidan di Era Digital</h1>
        <p>Gabung dan akses sistem informasi keanggotaan IBI Lampung Selatan secara online</p>
        <div class="cta">
            <a href="{{ route('login') }}">Masuk Sekarang</a>
        </div>
    </div>

    <!-- Sambutan Ketua Cabang -->
    <div class="sambutan-container"
        style="display: flex; flex-wrap: wrap; align-items: center; padding: 2rem; gap: 2rem;">
        <!-- Foto Ketua -->
        <div class="sambutan-foto" style="flex: 1; min-width: 280px; text-align: center;">
            <img src="{{ asset('assets//images/ketua_cabang.png') }}" alt="Ketua Cabang"
                style="max-width: 100%; border-radius: 50%; background: linear-gradient(to bottom, #fff, #f8cce5); padding: 10px;">
        </div>

        <!-- Teks Sambutan -->
        <div class="sambutan-teks" style="flex: 2; min-width: 300px;">
            <h2 style="font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem;">SAMBUTAN KETUA CABANG</h2>
            <h3 style="color: #870057; margin-bottom: 1rem;">Ikatan Bidan Indonesia Lampung Selatan</h3>
            <p style="text-align: justify;">
                Alhamdulillah segala puji bagi Allah SWT atas rahmat-Nya Ikatan Bidan Indonesia (IBI) dapat terus hadir
                membawa semangat untuk kemajuan pelayanan kesehatan perempuan, ibu dan anak serta peningkatan
                profesionalisme Bidan Indonesia melalui penguatan dan optimalisasi kinerja organisasi.
            </p>
            <p style="text-align: justify;">
                Melalui peluncuran pembaharuan sistem informasi IBI Lampung Selatan ini, kami berharap organisasi
                profesi bidan yang mandiri, akuntabel, kolaboratif dan sinergis akan terwujud dengan penyediaan berbagai
                layanan informasi dan edukasi bagi seluruh Bidan maupun masyarakat.
            </p>
            <p style="margin-top: 1rem; font-weight: bold; color: #870057;">
                Karmila Astuti, S.ST., Bdn.<br>
                <span style="font-weight: normal; color: #555;">Ketua Cabang IBI Lampung Selatan Periode
                    2023–2028</span>
            </p>
        </div>
    </div>

    <!-- Statistik Section -->
    <div class="statistik-container" style="padding: 2rem;">
        <h2 style="text-align:center; margin-bottom: 1.5rem;">Statistik Keanggotaan</h2>
        <div class="statistik-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem;">
            @for ($i = 1; $i <= 12; $i++)
                <div class="statistik-card"
                    style="background: #f5f5f5; padding: 1rem; text-align: center; border-radius: 8px;">
                    <h3>Judul {{ $i }}</h3>
                    <p>Data atau angka statistik</p>
                </div>
            @endfor
        </div>

        <!-- Image Running -->
        <div class="overflow-hidden bg-white py-6">
            <div class="logo-marquee group relative w-full">
                <div class="logo-track flex items-center gap-16 px-6">
                    <!-- Logo Set 1 -->
                    <img src="{{ asset('assets/images/lg-img-2.jpg') }}" alt="Logo 1" class="h-16 object-contain" />
                    <img src="{{ asset('assets/images/lg-img-3.jpg') }}" alt="Logo 2" class="h-16 object-contain" />
                    <img src="{{ asset('assets/images/lg-img-4.jpg') }}" alt="Logo 3" class="h-16 object-contain" />
                    <img src="{{ asset('assets/images/lg-img-6.jpg') }}" alt="Logo 4" class="h-16 object-contain" />
                    <img src="{{ asset('assets/images/lg-img-7.jpg') }}" alt="Logo 5" class="h-16 object-contain" />

                    <!-- Logo Set 2 (duplikat untuk seamless loop) -->
                    <img src="{{ asset('assets/images/lg-img-2.jpg') }}" alt="Logo 1" class="h-16 object-contain" />
                    <img src="{{ asset('assets/images/lg-img-3.jpg') }}" alt="Logo 2" class="h-16 object-contain" />
                    <img src="{{ asset('assets/images/lg-img-4.jpg') }}" alt="Logo 3" class="h-16 object-contain" />
                    <img src="{{ asset('assets/images/lg-img-6.jpg') }}" alt="Logo 4" class="h-16 object-contain" />
                    <img src="{{ asset('assets/images/lg-img-7.jpg') }}" alt="Logo 5" class="h-16 object-contain" />
                </div>
            </div>
        </div>

        <div class="info-ranting"
            style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; padding: 2rem;">

            <!-- Kolom 1: Pilih Ranting -->
            <div>
                <label for="ranting"><strong>Pilih Ranting:</strong></label>
                <select name="ranting" id="ranting" required style="width: 100%; padding: 0.5rem; margin-top: 0.5rem;"
                    onchange="tampilkanPengurus()">
                    <option value="">-- Pilih Ranting --</option>
                    <option value="Bakauheni">Bakauheni</option>
                    <option value="Branti_Raya">Branti Raya</option>
                    <option value="Bumi_Daya">Bumi Daya</option>
                    <option value="Candipuro">Candipuro</option>
                    <option value="Hajimena">Hajimena</option>
                    <option value="Jati_Agung">Jati Agung</option>
                    <option value="Kalianda">Kalianda</option>
                    <option value="Kaliasin">Kaliasin</option>
                    <option value="Karang_Anyar">Karang Anyar</option>
                    <option value="Katibung">Katibung</option>
                    <option value="Ketapang">Ketapang</option>
                    <option value="Merbau_Mataram">Merbau Mataram</option>
                    <option value="Natar">Natar</option>
                    <option value="Palas">Palas</option>
                    <option value="Penengahan">Penengahan</option>
                    <option value="Rajabasa">Rajabasa</option>
                    <option value="Rumah_Sakit">Rumah Sakit</option>
                    <option value="Sidomulyo">Sidomulyo</option>
                    <option value="Sragi">Sragi</option>
                    <option value="Sukadamai">Sukadamai</option>
                    <option value="Talang_Jawa">Talang Jawa</option>
                    <option value="Tanjung_Agung">Tanjung Agung</option>
                    <option value="Tanjung_Bintang">Tanjung Bintang</option>
                    <option value="Tanjung_Sari_Ntr">Tanjung Sari Ntr</option>
                    <option value="Tanjungsari">Tanjungsari</option>
                    <option value="Way_Panji">Way Panji</option>
                    <option value="Way_Sulan">Way Sulan</option>
                    <option value="Way_Urang">Way Urang</option>
                    <!-- Tambahkan ranting lainnya -->
                </select>
            </div>

            <!-- Kolom 2: Tempat Menampilkan Foto Pengurus -->
            <div id="pengurus-box" style="text-align: center;">
                <p><em>Silakan pilih ranting terlebih dahulu</em></p>
            </div>

            <!-- Kolom 3: Logo dan Deskripsi -->
            <div style="text-align: center;">
                <img src="{{ asset('assets/images/logo-ibi.png') }}" alt="Logo IBI" style="width: 120px;">
                <h3>IBI Cabang Lampung Selatan</h3>
                <p style="text-align: justify;">
                    Ikatan Bidan Indonesia (IBI) Cabang Lampung Selatan adalah wadah organisasi profesi bidan yang
                    mendukung pengembangan kompetensi, pelayanan, dan kolaborasi antar anggota demi peningkatan kualitas
                    kesehatan ibu dan anak di wilayah Lampung Selatan.
                </p>
            </div>
        </div>

        <script>
            const btn = document.getElementById("scrollTopBtn");

            window.onscroll = function() {
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    btn.style.display = "block";
                } else {
                    btn.style.display = "none";
                }
            };

            btn.onclick = function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            };
        </script>

        <!-- Copyright -->
        <div class="text-center text-sm"
            style="
        text-align: center;
        background-color: rgb(254, 164, 181);
        padding: 20px 10px;
        margin: 10px 0 0 0;
        color: #555;
        font-family: Arial, sans-serif;
    ">
            <i class="fas fa-copyright"></i> 2025 IBI Lampung Selatan. All rights reserved —
            Open Source Project by
            <a href="https://syababtechnology.com" target="_blank" rel="noopener noreferrer">
                Syabab Technology
            </a>
            <i class="fa fa-heart heart text-danger"></i>
        </div>
        <!-- tombol scroll -->
        <button id="scrollTopBtn" title="Kembali ke atas">&#8679;</button>
</body>
<!-- tombol scroll -->
<button id="scrollTopBtn" title="Kembali ke atas">&#8679;</button>
<script src="{{ asset('assets/js/pengurus.js') }}"></script>

</html>
