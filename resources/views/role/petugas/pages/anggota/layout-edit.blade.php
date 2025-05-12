@extends('dashboard.layouts.main')
@section('content')
    <div class="page-inner">

        <div class="d-flex gap-1 mb-3 nav">
            <a class="btn btn-select rounded-3 {{ request()->segment(4) === 'data_personal' ? 'active' : '' }}"
                href="{{ route('dashboard.' . roleName() . '.data_anggota.data_personal.edit', ['no_kta' => request()->route('no_kta')]) }}">
                Data Personal
             </a>
            <a class="btn btn-select rounded-3 {{ request()->segment(4) === 'kependudukan' ? 'active' : '' }}"
                href="{{ route('dashboard.' . roleName() . '.data_anggota.kependudukan.edit', ['no_kta' => request()->route('no_kta')]) }}">
                Data Kependudukan
             </a>
            <a class="btn btn-select rounded-3 {{ request()->segment(4) === 'pekerjaan' ? 'active' : '' }}"
                href="{{ route('dashboard.' . roleName() . '.data_anggota.pekerjaan.edit', ['no_kta' => request()->route('no_kta')]) }}">
                Data Pekerjaan
             </a>
            <a class="btn btn-select rounded-3 {{ request()->segment(4) === 'pendidikan' ? 'active' : '' }}"
                href="{{ route('dashboard.' . roleName() . '.data_anggota.pendidikan.edit', ['no_kta' => request()->route('no_kta')]) }}">
                Pendidikan
             </a>
            <a class="btn btn-select rounded-3 {{ request()->segment(4) === 'pelatihan' ? 'active' : '' }}"
                href="{{ route('dashboard.' . roleName() . '.data_anggota.pelatihan.edit', ['no_kta' => request()->route('no_kta')]) }}">
                Pelatihan
             </a>
            <a class="btn btn-select rounded-3 {{ request()->segment(4) === 'perizinan' ? 'active' : '' }}"
                href="{{ route('dashboard.' . roleName() . '.data_anggota.perizinan.edit', ['no_kta' => request()->route('no_kta')]) }}">
                Perizinan
             </a>
        </div>

        {{-- Breadcrumbs --}}
        <div class="page-header">
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('dashboard.' . roleName() . '.index') }}">
                        <i class="icon-home text-primary"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">{{ $data['page_name'] ?? '' }}</a>
                </li>
            </ul>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @yield('sectionData')
    </div>

    {{-- @include('role.anggota.pages.partials.add-pelatihan') --}}
    {{-- @include('role.anggota.pages.partials.add-pendidikan-profesi') --}}
@endsection
