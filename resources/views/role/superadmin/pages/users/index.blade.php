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
                        <button class="btn btn-primary rounded-3" data-bs-toggle="modal" data-bs-target="#addAkun">Tambah
                            Akun</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic_datatables2" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Lengkap</th>
                                        <th>NO KTA</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 1;

                                    @endphp
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->no_kta }}</td>
                                            <td>
                                                <button class="btn btn-primary rounded-3 btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#updateAkun{{ $item->id }}" title="Detail">
                                                    <i class="bi bi-info-circle"></i>
                                                </button>
                                                <button class="btn btn-warning rounded-3 btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#updatePassword{{ $item->id }}"
                                                    title="Update Password">
                                                    <i class="bi bi-key"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger rounded-3"
                                                    onclick="WarningAlert('delete', `/dashboard/{{ roleName() }}/user/{{ $item->id }}/delete`, 'Hapus Akun?', `Apakah anda yakin ingin menghapus pendidikan '{{ $item->name }}' ?`)"
                                                    title="Remove Akun : {{ $item->name }}"><i class="bi bi-trash3"></i>
                                                </button>
                                            </td>

                                        </tr>
                                        @include('role.superadmin.pages.users.partials.update-akun')
                                        @include('role.superadmin.pages.users.partials.update-password')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('role.superadmin.pages.users.partials.add-akun')
@endsection
