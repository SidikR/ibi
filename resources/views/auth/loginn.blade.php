<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/login/login.css') }}" />
    <link rel="icon" href="{{ asset('storage/image/favicon.webp') }}" type="image/x-icon">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <h1 class="mb-3">Sign Up</h1>
                <div class="d-flex flex-column w-100 gap-2">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" id="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Masukan alamat email anda..." aria-label="email" aria-describedby="email"
                            value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Masukan kata sandi Anda..." aria-label="password" aria-describedby="password"
                            value="{{ old('password') }}" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password_confirmation" id="password_confirmation" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Konfirmasi ulang kata sandi..." aria-label="password_confirmation"
                            aria-describedby="password_confirmation" value="{{ old('password_confirmation') }}"
                            required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div
                    class="mt-4 gap-2 button-submit d-flex flex-column justify-content-center align-items-center w-100 rounded-5">
                    <button type="submit"
                        class=" btn btn-sm btn-primary w-100 p-2 fs-5 fw-bold rounded-5">Daftar</button>
                </div>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Sign in</h1>
                <span>or use your account</span>
                <div class="d-flex flex-column gap-3 mt-3 w-100">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" id="email" name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Masukan Email Anda..." aria-label="email" aria-describedby="email"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Masukan password Anda..." aria-label="password" aria-describedby="password"
                            value="{{ old('password') }}" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="forgot-password-link mt-3 text-end text-warning" style="color: red">
                    @if (Route::has('password.request'))
                        <a class="text-body" style="font-size: 1rem" style="color: red"
                            href="{{ route('password.request') }}">
                            {{ __('Lupa Kata Sandi ?') }}
                        </a>
                    @endif
                </div>

                <div
                    class="mt-4 gap-2 button-submit d-flex flex-column justify-content-center align-items-center w-100">
                    <button type="submit"
                        class=" btn btn-sm btn-primary w-75 rounded-4 p-2 fs-5 fw-bold">Masuk</button>
                </div>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>
                        To keep connected with us please login with your personal info
                    </p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/login/login.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
