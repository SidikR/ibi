<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Error 500</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">

    <!-- Custom stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/error/style.css') }}" />
</head>

<body>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>Oops!</h1>
                <h2>500 - Server Error</h2>
            </div>

            {{-- Pesan error spesifik --}}
            @if(isset($exception))
                <p style="color:red; font-weight:bold;">
                    {{ $exception->getMessage() }}
                </p>
            @else
                <p>Terjadi kesalahan di server. Silakan coba lagi nanti.</p>
            @endif

            <a href="{{ url('/') }}">Go TO Homepage</a>
            <a href="mailto:sidikellampungi@gmail.com">Hubungi Administrator melalui Email</a>
        </div>
    </div>
</body>

</html>
