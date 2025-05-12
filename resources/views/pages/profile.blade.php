@extends('dashboard.layouts.main')
@section('content')
    <div class="page-inner">

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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-col flex-lg-row">
                        <h4 class="card-title">{{ $data['page_name'] ?? '' }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dashboard.' . roleName() . '.profile.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <fieldset>
                                    <div class="row">
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label for="name">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', $user->name ?? '') }}" required>
                                        </div>
            
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email', $user->email ?? '') }}" required>
                                        </div>
            
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label for="no_kta">No KTA</label>
                                            <input type="text" name="no_kta" class="form-control"
                                                value="{{ old('no_kta', $user->no_kta ?? '') }}" required>
                                        </div>
            
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control">
                                                <option value="Laki-laki"
                                                    {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki</option>
                                                <option value="Perempuan"
                                                    {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>
                                        </div>
            
                                        <div class="mb-3 col-12 col-lg-6">
                                            <label for="foto">Foto</label>
                                            <input type="file" name="foto" class="form-control">
                                            @if (isset($user) && $user->foto)
                                                <img src="{{ asset($user->foto) }}" alt="Foto" width="100"
                                                    class="mt-2">
                                            @endif
                                        </div>
                                    </div>
                                </fieldset>
            
                            </div>
                            <div class="modal-footer d-flex gap-2">
                                <button type="button" class="btn rounded-3 btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn rounded-3 btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
