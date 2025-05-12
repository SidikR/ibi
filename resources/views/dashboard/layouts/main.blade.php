<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard Admin</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('assets/images/logo-ibi.png') }}" type="image/x-icon" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- 
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- include libraries(jQuery, bootstrap) -->
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}

    <!-- Fonts and icons -->
    <script src="{{ asset('assets-dashboard/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('assets-dashboard/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <link rel="stylesheet" href="{{ asset('vendor/suggestags/css/amsify.suggestags.css') }}">
    <script src="{{ asset('vendor/suggestags/js/jquery.amsify.suggestags.js') }}"></script>
    <script src="{{ asset('assets-dashboard/utils/calculateDaysAgo.js') }}"></script>
    <script src="{{ asset('assets-dashboard/utils/handleUploadImage.js') }}"></script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets-dashboard/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets-dashboard/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets-dashboard/css/kaiadmin.min.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets-dashboard/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <link rel="stylesheet" src="{{ asset('vendor/summernote/summernote-lite.css') }}">
    </link>
    <script src="{{ asset('vendor/summernote/summernote-lite.js') }}"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <style>
        .profile-card {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .profile-header {
            height: 200px;
            background-image: url('/assets/images/memberbackground.png');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid white;
            position: absolute;
            bottom: -80px;
            /* posisi menggantung */
            left: 30px;
            z-index: 10;
            background-color: white;
        }

        .profile-content {
            padding-top: 1rem;
            /* beri ruang untuk gambar */
            padding-left: 200px;
            padding-right: 20px;
            padding-bottom: 20px;
        }

        .status-badge {
            position: absolute;
            top: 10px;
            right: 15px;
        }

        .btn-select{
            background-color: #1572E8;
            color: white;
        }
        .btn-select.active{
            background-color: green;
            color: white;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('dashboard.partials.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="" class="logo">
                            <img loading="lazy" src="{{ asset('assets/images/ibi_front.png') }}" alt="navbar brand"
                                class="navbar-brand" height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>

                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <div id="current-time"></div>
                            </li>
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img loading="lazy" src="{{ asset(Auth::user()->foto) }}" alt="..."
                                            class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hai,</span>
                                        <span class="fw-bold">{{ Auth::user()->name }}</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-sm">
                                                    <img loading="lazy" src="{{ asset(Auth::user()->foto) }}"
                                                        alt="..." class="avatar-img rounded-circle" />
                                                </div>
                                                <div class="u-text">
                                                    <h4>{{ Auth::user()->name }}</h4>
                                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item"
                                                href="{{ route('dashboard.' . roleName() . '.profile') }}">My
                                                Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button class="dropdown-item" type="submit" role="button">
                                                    Logout
                                                </button>
                                            </form>
                                        </li>

                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        @include('components.card-banner')
                    </div>
                </div>
                @yield('content')
            </div>

            <footer class="footer">
                <div class="container-fluid d-flex justify-content-center">
                    <div class="copyright text-center">
                        © Copyright {{ now()->year }}
                        <strong>IBI - Ikatan Bidan Indonesia</strong> —
                        Open Source Project by
                        <a href="https://syababtechnology.com" target="_blank" rel="noopener noreferrer">
                            Syabab Technology
                        </a>
                        <i class="fa fa-heart heart text-danger"></i>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--   Core JS Files   -->

    {{-- <script src="{{ asset('assets-dashboard/js/core/jquery-3.7.1.min.js') }}"></script> --}}
    <script src="{{ asset('assets-dashboard/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets-dashboard/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets-dashboard/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets-dashboard/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets-dashboard/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets-dashboard/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- Bootstrap Notify -->
    <script src="{{ asset('assets-dashboard/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets-dashboard/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets-dashboard/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets-dashboard/js/kaiadmin.min.js') }}"></script>

    {{-- Datatables --}}
    <script src="{{ asset('assets-dashboard/js/datatables/datatables.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets-dashboard/js/setting-demo.js') }}"></script>
    {{-- <script src="{{ asset('assets-dashboard/js/demo.js') }}"></script> --}}

    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: '100%',
                placeholder: '-- Pilih --'
            });
        });
    </script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script defer>
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var baseURL = window.location.origin;

        function showAlert(icon, message, action = null, url = null) {
            Swal.fire({
                position: "center",
                icon: icon,
                title: message,
                showConfirmButton: false,
                timer: 3000
            }).then(() => {
                if (action === "reload") {
                    window.location.reload();
                } else if (action === "redirect" && url) {
                    window.location.href = `${url}`;
                }
            });
        }

        function SuccessAlert(message, action, url) {
            showAlert("success", message, action, url);
        }

        function ErrorAlert(message, action, url) {
            showAlert("error", message, action, url);
        }

        function WarningAlert(method, url, title, text) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger m-2"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: title,
                text: text,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    axios[method](url, {}, {
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => {
                            if (response.data.success) {
                                SuccessAlert(response.data.message, 'reload');
                            } else {
                                ErrorAlert(response.data.message);
                            }
                        })
                        .catch(error => {
                            ErrorAlert('An error occurred while processing your request', 'reload');
                            console.error(error);
                        });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Your action was cancelled.",
                        icon: "error"
                    });
                }
            });
        }

        function WarningAlertRedirect(method, url, title, text, redirectUrl) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger m-2"
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: title,
                text: text,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    axios[method](url, {}, {
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => {
                            if (response.data.success) {
                                SuccessAlert(response.data.message, 'redirect', redirectUrl);
                            } else {
                                ErrorAlert(response.data.message);
                            }
                        })
                        .catch(error => {
                            ErrorAlert('An error occurred while processing your request', 'reload');
                            console.error(error);
                        });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Your action was cancelled.",
                        icon: "error"
                    });
                }
            });
        }
    </script>

    @if (session('success'))
        <script>
            SuccessAlert("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            ErrorAlert("{{ session('error') }}");
        </script>
    @endif

    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

</body>

</html>
