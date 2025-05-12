@extends('role.petugas.pages.anggota.layout-edit')
@section('sectionData')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title">Form {{ $data['page_name'] ?? '' }}</h4>
        </div>
        <div class="card-body">
            @include('components.forms.pelatihan')
        </div>
    </div>
@endsection
