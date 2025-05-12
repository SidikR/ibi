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
                        {{-- <button class="btn btn-primary rounded-3" data-bs-toggle="modal"
                            data-bs-target="#modalTambahPelatihan">Tambah Pelatihan</button> --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exportAnggotaModal">
                            Export
                        </button>
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
                                    @foreach ($anggotas as $item)
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->no_kta }}</td>
                                            <td class="">
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('dashboard.' . roleName() . '.data_anggota.data_personal.edit', ['no_kta' => $item->no_kta]) }}">
                                                    Edit
                                                </a>
                                                {{-- <button class="btn btn-primary rounded-3 btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalPelatihan{{ $item->id }}">Detail</button> --}}
                                            </td>
                                        </tr>

                                        {{-- <div class="modal fade" id="modalPelatihan{{ $item->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-xl">
                                                <form method="POST"
                                                    action="{{ route('dashboard.' . roleName() . '.pelatihan.update', ['id' => $item->id]) }}"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Pelatihan</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <fieldset>
                                                                <div class="row">
                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label for="jenis_pelatihan"
                                                                            class="form-label">Jenis Pelatihan</label>
                                                                        <select name="jenis_pelatihan" class="form-select"
                                                                            required>
                                                                            <option value="">-- Pilih Jenis Pelatihan
                                                                                --
                                                                            </option>
                                                                            @foreach (['IUD', 'IMPLAN', 'KONSELING KB', 'APN', 'CTU', 'PI', 'ASPIXIA', 'KIP-K', 'MTBM', 'MTBS', 'ABPK', 'PONED', 'PONEK', 'LAKTASI', 'KELAS BUMIL', 'BBLR', 'JABFUNG', 'POSKESDES DESA SIAGA', 'DDTK', 'IVA', 'RR-KB', 'ASKEB', 'KESPRO REMAJA', 'CTS', 'PPGDON'] as $jenis_pelatihan)
                                                                                <option value="{{ $jenis_pelatihan }}"
                                                                                    {{ $item->jenis_pelatihan == $jenis_pelatihan ? 'selected' : '' }}>
                                                                                    {{ $jenis_pelatihan }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label class="form-label">Tahun Pelatihan</label>
                                                                        <input type="number" name="tahun_pelatihan"
                                                                            class="form-control"
                                                                            value="{{ $item->tahun_pelatihan }}">
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label for="deskripsi_pelatihan"
                                                                            class="form-label">Deskripsi Pelatihan</label>
                                                                        <textarea class="form-control" name="deskripsi_pelatihan" id="deskripsi_pelatihan" rows="3">{{ $item->deskripsi_pelatihan }}</textarea>
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label class="form-label">Upload Sertifikat
                                                                            (PDF)
                                                                        </label>
                                                                        <input type="file" name="path_sertifikat"
                                                                            class="form-control">
                                                                        @if ($item->path_sertifikat)
                                                                            <small class="text-muted">File sekarang: <a
                                                                                    href="{{ asset('storage/sertifikat/' . $item->path_sertifikat) }}"
                                                                                    target="_blank">Lihat</a></small>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </fieldset>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-primary rounded-3">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div> --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('role.anggota.pages.partials.add-pelatihan') --}}
    {{-- @include('role.anggota.pages.partials.add-pendidikan-profesi') --}}
    @include('role.petugas.pages.anggota.partials.modal-export')
@endsection
