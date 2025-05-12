@extends('dashboard.layouts.main')
@section('content')
    <div class="container text-center p-3">
        <h1>Selamat Datang {{ nameUser() }} sebagai {{ roleName() }}</h1>
    </div>
@endsection
