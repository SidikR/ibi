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

        {{-- Konten --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-col flex-lg-row">
                        <h4 class="card-title">Tabel Pendidikan Profesi</h4>
                        <button class="btn btn-primary rounded-3" data-bs-toggle="modal"
                            data-bs-target="#modalTambahPendidikanProfesi">Tambah Pendidikan</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic_datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Jenjang</th>
                                        <th>Jurusan</th>
                                        <th>Nama Perguruan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 1;

                                    @endphp
                                    @foreach ($pendidikanProfesis as $item)
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{ $item->jenjang }}</td>
                                            <td>{{ $item->jurusan }}</td>
                                            <td>{{ $item->nama_pt }}</td>
                                            <td class="">
                                                <button class="btn btn-primary rounded-3 btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalReadPendidikanProfesi{{ $item->id }}"> <i class="bi bi-info-circle"></i></button>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="WarningAlert('delete', '/dashboard/{{ roleName() }}/pendidikan-profesi/delete/{{ $item->id }}', 'Delete pendidikan?', `Apakah anda yakin ingin menghapus pendidikan '{{ $item->jenjang }}' ?`)"
                                                    title="Remove News : {{ $item->jenjang }}"><i
                                                        class="bi bi-trash3"></i></button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modalReadPendidikanProfesi{{ $item->id }}"
                                            tabindex="-1">
                                            <div class="modal-dialog modal-xl">
                                                <form method="POST"
                                                    action="{{ route('dashboard.' . roleName() . '.pendidikan-profesi.update', ['id' => $item->id]) }}"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Pendidikan Formal</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <fieldset>
                                                                <div class="row">
                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label for="jenjang"
                                                                            class="form-label">Jenjang</label>
                                                                        <select name="jenjang" class="form-select" required>
                                                                            <option value="">-- Pilih Jenjang --
                                                                            </option>
                                                                            @foreach (['SD', 'SMP', 'SMA/SMK', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'] as $jenjang)
                                                                                <option value="{{ $jenjang }}"
                                                                                    {{ $item->jenjang == $jenjang ? 'selected' : '' }}>
                                                                                    {{ $jenjang }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label class="form-label">Jurusan</label>
                                                                        <input type="text" name="jurusan"
                                                                            class="form-control"
                                                                            value="{{ $item->jurusan }}">
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label class="form-label">Nama Perguruan</label>
                                                                        <input type="text" name="nama_pt"
                                                                            class="form-control"
                                                                            value="{{ $item->nama_pt }}" required>
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label class="form-label">Alamat Perguruan</label>
                                                                        <input type="text" name="alamat_pt"
                                                                            class="form-control"
                                                                            value="{{ $item->alamat_pt }}">
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label class="form-label">Tahun Lulus</label>
                                                                        <input type="text" name="tahun_lulus"
                                                                            class="form-control"
                                                                            value="{{ $item->tahun_lulus }}">
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label class="form-label">No Ijazah</label>
                                                                        <input type="text" name="no_ijazah"
                                                                            class="form-control"
                                                                            value="{{ $item->no_ijazah }}">
                                                                    </div>

                                                                    <div class="mb-3 col-12">
                                                                        <label class="form-label">Upload Ijazah
                                                                            (PDF)
                                                                        </label>
                                                                        <input type="file" name="path_ijazah"
                                                                            class="form-control">
                                                                        @if ($item->path_ijazah)
                                                                            <small class="text-muted">File sekarang: <a
                                                                                    href="{{ asset('storage/' . $item->path_ijazah) }}"
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
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between flex-col flex-lg-row">
                        <h4 class="card-title">Tabel Pendidikan Formal</h4>
                        <button class="btn btn-primary rounded-3" data-bs-toggle="modal"
                            data-bs-target="#modalTambahPendidikanFormal">Tambah Pendidikan</button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic_datatables2" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Jenjang</th>
                                        <th>Jurusan</th>
                                        <th>Nama Perguruan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 1;

                                    @endphp
                                    @foreach ($pendidikanFormals as $item)
                                        <tr>
                                            <td>{{ $index++ }}</td>
                                            <td>{{ $item->jenjang }}</td>
                                            <td>{{ $item->jurusan }}</td>
                                            <td>{{ $item->nama_pt }}</td>
                                            <td class="">
                                                <button class="btn btn-primary rounded-3 btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#modalReadPendidikanFormal{{ $item->id }}"> <i class="bi bi-info-circle"></i></button>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    onclick="WarningAlert('delete', '/dashboard/{{ roleName() }}/pendidikan-formal/delete/{{ $item->id }}', 'Delete pendidikan?', `Apakah anda yakin ingin menghapus pendidikan '{{ $item->jenjang }}' ?`)"
                                                    title="Remove News : {{ $item->jenjang }}"><i
                                                        class="bi bi-trash3"></i></button>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modalReadPendidikanFormal{{ $item->id }}"
                                            tabindex="-1">
                                            <div class="modal-dialog modal-xl">
                                                <form method="POST"
                                                    action="{{ route('dashboard.' . roleName() . '.pendidikan-formal.update', ['id' => $item->id]) }}"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Update Pendidikan Formal</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <fieldset>
                                                                <div class="row">
                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label for="jenjang"
                                                                            class="form-label">Jenjang</label>
                                                                        <select name="jenjang" class="form-select"
                                                                            required>
                                                                            <option value="">-- Pilih Jenjang --
                                                                            </option>
                                                                            @foreach (['SD', 'SMP', 'SMA/SMK', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'] as $jenjang)
                                                                                <option value="{{ $jenjang }}"
                                                                                    {{ $item->jenjang == $jenjang ? 'selected' : '' }}>
                                                                                    {{ $jenjang }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label class="form-label">Jurusan</label>
                                                                        <input type="text" name="jurusan"
                                                                            class="form-control"
                                                                            value="{{ $item->jurusan }}">
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label class="form-label">Nama Perguruan</label>
                                                                        <input type="text" name="nama_pt"
                                                                            class="form-control"
                                                                            value="{{ $item->nama_pt }}" required>
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label class="form-label">Alamat Perguruan</label>
                                                                        <input type="text" name="alamat_pt"
                                                                            class="form-control"
                                                                            value="{{ $item->alamat_pt }}">
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label class="form-label">Tahun Lulus</label>
                                                                        <input type="text" name="tahun_lulus"
                                                                            class="form-control"
                                                                            value="{{ $item->tahun_lulus }}">
                                                                    </div>

                                                                    <div class="mb-3 col-12 col-lg-6">
                                                                        <label class="form-label">No Ijazah</label>
                                                                        <input type="text" name="no_ijazah"
                                                                            class="form-control"
                                                                            value="{{ $item->no_ijazah }}">
                                                                    </div>

                                                                    <div class="mb-3 col-12">
                                                                        <label class="form-label">Upload Ijazah
                                                                            (PDF)
                                                                        </label>
                                                                        <input type="file" name="path_ijazah"
                                                                            class="form-control">
                                                                        @if ($item->path_ijazah)
                                                                            <small class="text-muted">File sekarang: <a
                                                                                    href="{{ asset('storage/' . $item->path_ijazah) }}"
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
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('role.pages.partials.add-pendidikan-formal')
    @include('role.pages.partials.add-pendidikan-profesi')
@endsection
