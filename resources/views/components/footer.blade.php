    <footer id="footer" class="footer pb-0 position-relative ">

        <div class="container footer-top">

            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="#" class="logo d-flex align-items-center m-0">
                        <span class="color-primary">{{ getInfo()->title }}</span>
                    </a>
                    {{-- <a href="https://lampungselatankab.go.id" target="_blank">Pemerintah Kabupaten Lampung Selatan</a> --}}
                    <div class="social-links d-flex mt-4">
                        <a href="{{ getInfo()->twitter }}" target="_blank">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a target="_blank" href="{{ getInfo()->facebook }}"><i class="bi bi-facebook"></i></a>
                        <a target="_blank" href="{{ getInfo()->instagram }}"><i class="bi bi-instagram"></i></a>
                        {{-- <a href=""><i class="bi bi-linkedin"></i></a> --}}
                    </div>
                </div>

                <div class="col-lg-2 col-12 footer-links">
                    <h4>Menu</h4>
                    <ul>
                        <li><a href="{{ route('tentang_kami.index') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('product.index') }}">Produk</a></li>
                        <li><a href="{{ route('testimoni.index') }}">Testimoni</a></li>
                        <li><a href="{{ route('berita.index') }}">Berita</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-12 footer-links">
                    <h4>Product</h4>
                    <ul>
                        @foreach (getProduct() as $product)
                            <li><a href="{{ route('product.detail', $product->slug) }}">{{ $product->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-md-start">
                    <h4>Contact Us</h4>
                    <p>{{ getInfo()->alamat }}
                    </p>
                    <p class="mt-4"><strong>Phone:</strong>
                        <span>
                            <a href="https://wa.me/{{ getInfo()->hp }}?text=Halo%20PT.%20Mitra%20Inti%20Service%2C%0ASaya%20[Nama%20Anda]%20dari%20[Nama%20Perusahaan%20Anda].%20Saya%20ingin%20mendapatkan%20informasi%20lebih%20lanjut%20mengenai%20layanan%20penyewaan%20forklift%20yang%20Anda%20tawarkan.%0A%0AApakah%20saya%20bisa%20mendapatkan%20penjelasan%20lebih%20lanjut%20dan%20jadwal%20pertemuan%20untuk%20mendiskusikan%20kebutuhan%20proyek%20kami%3F%20Terima%20kasih%20atas%20responsnya.%0A%0ASalam%2C%0A[Nama%20Anda]%0A[Kontak%20Telepon/Email]"
                                target="_blank">
                                {{ getInfo()->hp }}
                            </a>
                        </span>
                    </p>

                    <p><strong>Email:</strong> <a href="mailto:{{ getInfo()->email }}">{{ getInfo()->email }}</a></p>
                </div>

            </div>

        </div>

        <div class="container-fluid copyright text-center mt-4 mb-0">
            <p>&copy; <span>Copyright 2024</span> <strong class="px-1">{{ getInfo()->title }}</strong>
                <span>All
                    Rights Reserved</span>
            </p>
        </div>

    </footer>
