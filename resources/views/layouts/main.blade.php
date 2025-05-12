<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-language" content="id" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root {
            --background-color: #ffffff;
            --background-color-secondary: #f75902;
            --background-color-rgb: 255, 255, 255;
            --default-color: #212529;
            --default-color-rgb: 33, 37, 41;
            --primary-color: #1196d8;
            --primary-color-rgb: 132, 194, 37;
            --secondary-color: #f75902;
            --secondary-color-rgb: 50, 53, 58;
            --contrast-color: #ffffff;
            --contrast-color-rgb: 255, 255, 255;
        }

        img.lazy {
            filter: blur(5px);
            /* Blur efek pada placeholder */
            transition: filter 0.3s;
        }

        img:not(.lazy) {
            filter: none;
            /* Hilangkan blur setelah gambar asli dimuat */
        }

        .nav a.btn.btn-section {
            background-color: #1196d8 !important;
            color: white;
        }

        a.btn-section.active {
            background-color: #1196d8 !important;
            color: white;
        }
    </style>

    <!-- Title -->
    <title>{{ isset($meta['title']) ? $meta['title'] . ' | ' . getInfo()->title : getInfo()->title }}</title>
    <meta name="title"
        content="{{ isset($meta['title']) ? $meta['title'] . ' | ' . getInfo()->title : getInfo()->title }}">

    <!-- Description -->
    <meta name="description"
        content="{{ isset($meta['description']) ? $meta['description'] : 'PT. Mitra Inti Service melayani rental dan jual beli forklift (electric, diesel, gasoline), scissor lift, reach truck, serta service forklift terpercaya di Bekasi. Solusi terbaik untuk kebutuhan material handling Anda sejak 2009.' }}">

    <!-- Keywords -->
    <meta name="keywords"
        content="{{ isset($meta['keywords']) ? $meta['keywords'] : 'rental forklift, forklift electric, forklift diesel, forklift gasoline, scissor lift, reach truck, service forklift, jual beli forklift, forklift Bekasi, material handling, solusi material handling, Mitra Inti Service, terpercaya di Bekasi, sejak 2009, sewa forklift Bekasi, jual forklift baru, forklift second, rental scissor lift, jual reach truck, perbaikan forklift, penyewaan forklift, forklift murah, spare part forklift, forklift Indonesia' }}">

    <!-- Author -->
    <meta name="author" content="{{ isset($meta['author']) ? $meta['author'] : getInfo()->title }}">

    <!-- Robots -->
    <meta name="robots" content="index, follow">

    <!-- Cache control -->
    <meta name="revisit-after" content="1 days">
    <meta name="generator" content="Laravel">

    <!-- Geolocation -->
    <meta name="language" content="id" />
    <meta name="geo.country" content="ID" />
    <meta name="geo.placename" content="Indonesia" />

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "{{ getInfo()->title }}",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('assets/img/kominfo.png') }}",
      "description": "PT. Mitra Inti Service melayani rental dan jual beli forklift (electric, diesel, gasoline), scissor lift, reach truck, serta service forklift terpercaya di Bekasi. Solusi terbaik untuk kebutuhan material handling Anda sejak 2009.",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+62-123456789",
        "contactType": "Customer Service"
      }
    }
    </script>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image:width" content="1900">
    <meta property="og:image:height" content="600">
    <meta property="og:title"
        content="{{ isset($meta['title']) ? $meta['title'] . ' | ' . getInfo()->title : getInfo()->title }}">
    <meta property="og:description"
        content="{{ isset($meta['description']) ? $meta['description'] : 'PT. Mitra Inti Service melayani rental dan jual beli forklift (electric, diesel, gasoline), scissor lift, reach truck, serta service forklift terpercaya di Bekasi. Solusi terbaik untuk kebutuhan material handling Anda sejak 2009.' }}">
    <meta property="og:image" content="{{ $meta['thumbnail'] ?? asset('storage/image/thumbnail.jpg') }}">
    <meta property="og:site_name" content="PT. Mitra Inti Service">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="twitter:title"
        content="{{ isset($meta['title']) ? $meta['title'] . ' | ' . getInfo()->title : getInfo()->title }}" />
    <meta property="twitter:description"
        content="{{ isset($meta['description']) ? $meta['description'] : 'PT. Mitra Inti Service melayani rental dan jual beli forklift (electric, diesel, gasoline), scissor lift, reach truck, serta service forklift terpercaya di Bekasi. Solusi terbaik untuk kebutuhan material handling Anda sejak 2009.' }}" />
    <meta property="twitter:image" content="{{ $meta['thumbnail'] ?? asset('storage/image/thumbnail.jpg') }}" />

    <!-- News -->
    @if (isset($meta['published_at']))
        <meta property="article:published_time" content="{{ $meta['published_at'] }}" />
    @endif

    @if (isset($meta['modified_at']))
        <meta property="article:modified_time" content="{{ $meta['modified_at'] }}" />
    @endif

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('storage/image/favicon.webp') }}" type="image/x-icon">

    <!-- Cache-Control -->
    <?php header('Cache-Control: max-age=3600, public'); ?>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- HSTS -->
    <?php header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload'); ?>

    <!-- CORS -->
    <?php header('Access-Control-Allow-Origin: *'); ?>

    <!-- CSS and JS -->
    @vite(['resources/css/app.css'])
    <script src="{{ asset('vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/utils/calculateDaysAgo.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-70B1E9M424"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-70B1E9M424');
    </script>
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu">

    <div class="loader-container">
        <div class="loader-bar" id="loaderBar"></div>
    </div>

    <x-navbar />

    <main id="main">
        @yield('content')

    </main>

    <x-footer />

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/js/app.js'])

    <script>
        function updateTime() {
            const now = new Date();
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const months = [
                'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
                'November', 'December'
            ];

            const dayName = days[now.getDay()];
            const monthName = months[now.getMonth()];
            const day = now.getDate().toString().padStart(2, '0');
            const year = now.getFullYear();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');

            const formattedTime = `${dayName}, ${day} ${monthName} ${year}  -  ${hours}:${minutes}:${seconds}`;

            document.getElementById('current-time').textContent = formattedTime;
        }

        setInterval(updateTime, 1000); // Update every second
        updateTime(); // Initial call to display time immediately
    </script>

    <script>
        var csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content");

        function SuccessAlert(message, action, url) {
            var baseURL = window.location.origin;

            // Validasi parameter
            if (action === "reload") {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: message,
                    showConfirmButton: false,
                    timer: 3000,
                }).then(() => {
                    window.location.reload();
                });
            } else if (action === "redirect" && url) {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: message,
                    showConfirmButton: false,
                    timer: 3000,
                }).then(() => {
                    window.location.href = `${baseURL}/${url}`;
                });
            } else {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: message,
                    showConfirmButton: false,
                    timer: 3000,
                });
            }
        }

        function ErrorAlert(message, action, url) {
            var baseURL = window.location.origin;

            // Validasi parameter
            if (action === "reload") {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: message,
                    showConfirmButton: false,
                    timer: 3000,
                }).then(() => {
                    window.location.reload();
                });
            } else if (action === "redirect" && url) {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: message,
                    showConfirmButton: false,
                    timer: 3000,
                }).then(() => {
                    window.location.href = `${baseURL}/${url}`;
                });
            } else {
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: message,
                    showConfirmButton: false,
                    timer: 3000,
                });
            }
        }

        function WarningAlert(method, url, title, text) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger m-2",
                },
                buttonsStyling: false,
            });
            swalWithBootstrapButtons
                .fire({
                    title: title,
                    text: text,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        axios[method](
                                url, {}, {
                                    baseURL: window.location.origin,
                                    headers: {
                                        "X-CSRF-TOKEN": csrfToken,
                                        "Content-Type": "application/json",
                                    },
                                }
                            )
                            .then((response) => {
                                if (response.data.success) {
                                    SuccessAlert(response.data.message, "reload");
                                } else {
                                    ErrorAlert(response.data.message);
                                }
                            })
                            .catch((error) => {
                                ErrorAlert(
                                    "An error occurred while processing your request. mkmkm"
                                );
                                console.error(error);
                            });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelled",
                            text: "Your imaginary file is safe :)",
                            icon: "error",
                        });
                    }
                });
        }

        function LogoutAlert(title, text, form) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger m-2",
                },
                buttonsStyling: false,
            });
            swalWithBootstrapButtons
                .fire({
                    title: title,
                    text: text,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        event.preventDefault();
                        form.submit();
                        SuccessAlert("Berhasil Logout", "reload");
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelled",
                            text: "Ok stay sisini saja ya ;)",
                            icon: "error",
                        });
                    }
                });
        }
        @if (session('success'))
            var successMessage = "{{ session('success') }}";
            SuccessAlert(successMessage);
        @endif

        @if (session('error'))
            var errorMessage = "{{ session('error') }}";
            ErrorAlert(errorMessage);
        @endif
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let lazyImages = document.querySelectorAll("img.lazy");

            if ("IntersectionObserver" in window) {
                let lazyImageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            let lazyImage = entry.target;
                            lazyImage.src = lazyImage.dataset.src;
                            lazyImage.classList.remove("lazy");
                            lazyImageObserver.unobserve(lazyImage);
                        }
                    });
                });

                lazyImages.forEach(function(lazyImage) {
                    lazyImageObserver.observe(lazyImage);
                });
            } else {
                // Fallback untuk browser lama tanpa Intersection Observer
                lazyImages.forEach(function(lazyImage) {
                    lazyImage.src = lazyImage.dataset.src;
                    lazyImage.classList.remove("lazy");
                });
            }
        });
    </script>

</body>

</html>
