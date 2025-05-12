<form action="{{ route('dashboard.' . roleName() . '.pekerjaan.update') }}" method="POST">
    @csrf

    {{-- STATUS PEKERJAAN --}}
    <div class="mb-3">
        <label for="status_pekerjaan" class="form-label">Status Pekerjaan <span class="text-danger">*</span></label>
        <select id="status_pekerjaan" name="status_pekerjaan"
            class="form-select @error('status_pekerjaan') is-invalid @enderror" required>
            <option value="" disabled
                {{ old('status_pekerjaan', $pekerjaan->status_pekerjaan ?? '') ? '' : 'selected' }}>
                -- Pilih Status Pekerjaan --</option>
            @php
                $statuses = [
                    'pns' => 'PNS',
                    'honda' => 'Honda',
                    'hondis' => 'Hondis',
                    'tks' => 'TKS',
                    'pmb' => 'PMB',
                    'pegawai_klinik_pmb' => 'Pegawai Klinik PMB',
                    'karyawan_swasta' => 'Karyawan Swasta',
                    'wiraswasta' => 'Wiraswasta',
                    'tidak_bekerja' => 'Belum/Tidak Bekerja',
                ];
            @endphp
            @foreach ($statuses as $value => $label)
                <option value="{{ $value }}"
                    {{ old('status_pekerjaan', $pekerjaan->status_pekerjaan ?? '') === $value ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>
        @error('status_pekerjaan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- FORM TEMPAT KERJA --}}
    <div id="form_tempat_kerja"
        class="{{ in_array(old('status_pekerjaan', $pekerjaan->status_pekerjaan ?? ''), ['', 'tidak_bekerja']) ? 'd-none' : '' }}">
        {{-- Akan diisi oleh JavaScript --}}
    </div>

    {{-- SUBMIT --}}
    <div class="mt-4 float-end">
        <button class="btn btn-success rounded-3"><i class="bi bi-save me-1"></i> Update</button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const statusSelect = document.getElementById('status_pekerjaan');
        const targetDiv = document.getElementById('form_tempat_kerja');
        const defaultTempatKerja = @json($pekerjaan->tempat_kerja);

        const formCommon = `
        <div class="mb-3">
            <label class="form-label" for="nama_instansi">Nama Instansi/Tempat Kerja</label>
            <input type="text" name="nama_instansi" id="nama_instansi" class="form-control" placeholder="Contoh: RSUD Lampung Selatan"
                   value="{{ old('nama_instansi', $pekerjaan->nama_instansi ?? '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="alamat_kerja">Alamat Tempat Kerja</label>
            <textarea name="alamat_kerja" id="alamat_kerja" rows="2" class="form-control" placeholder="Alamat lengkap">{{ old('alamat_kerja', $pekerjaan->alamat_kerja ?? '') }}</textarea>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="propinsi_kerja">Provinsi</label>
                <input type="text" name="propinsi_kerja" id="propinsi_kerja" class="form-control" placeholder="Provinsi"
                       value="{{ old('propinsi_kerja', $pekerjaan->propinsi_kerja ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="kabupaten_kerja">Kabupaten/Kota</label>
                <input type="text" name="kabupaten_kerja" id="kabupaten_kerja" class="form-control" placeholder="Kabupaten/Kota"
                       value="{{ old('kabupaten_kerja', $pekerjaan->kabupaten_kerja ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="kecamatan_kerja">Kecamatan</label>
                <input type="text" name="kecamatan_kerja" id="kecamatan_kerja" class="form-control" placeholder="Kecamatan"
                       value="{{ old('kecamatan_kerja', $pekerjaan->kecamatan_kerja ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="desa_kerja">Desa/Kelurahan</label>
                <input type="text" name="desa_kerja" id="desa_kerja" class="form-control" placeholder="Desa/Kelurahan"
                       value="{{ old('desa_kerja', $pekerjaan->desa_kerja ?? '') }}">
            </div>
        </div>`;

        const selectTemplate = (label, groups) => {
            let opts = '';
            groups.forEach(g => {
                opts += `<optgroup label="${g.label}">${g.items.map(i => `
                <option value="${i}" ${i === defaultTempatKerja ? 'selected' : ''}>${i}</option>
            `).join('')}</optgroup>`;
            });
            return `
<div class="mb-3">
    <label class="form-label" for="tempat_kerja">${label}</label>
    <select name="tempat_kerja" id="tempat_kerja" class="form-select" required>
        <option value="" disabled ${defaultTempatKerja ? '' : 'selected'}>-- Pilih Tempat Bekerja --</option>
        ${opts}
    </select>
</div>`;
        };



        const templates = {
            pns: selectTemplate('Tempat Bekerja', [{
                label: 'Fasilitas Pemerintah',
                items: ['RSUD', 'Puskesmas', 'Dinas Kesehatan', 'Kemenkes']
            }]) + formCommon,
            honda: formCommon,
            hondis: formCommon,
            tks: formCommon,
            pmb: selectTemplate('Tempat Bekerja', [{
                label: 'Swasta',
                items: ['Klinik Bersalin', 'PMB']
            }]) + formCommon,
            pegawai_klinik_pmb: selectTemplate('Tempat Bekerja', [{
                label: 'Klinik & Apotek',
                items: ['Rumah Sakit Swasta', 'Klinik Pratama', 'Klinik Utama',
                    'Klinik Bersalin', 'PMB', 'Apotek'
                ]
            }]) + formCommon,
            karyawan_swasta: selectTemplate('Tempat Bekerja', [{
                label: 'Non-Medis',
                items: ['Perusahaan', 'Mall', 'Toko', 'NGO', 'Yayasan Sosial']
            }]) + formCommon,
            wiraswasta: formCommon
        };

        function updateForm(status) {
            if (!status || status === 'tidak_bekerja') {
                targetDiv.classList.add('d-none');
                targetDiv.innerHTML = '';
                return;
            }
            targetDiv.classList.remove('d-none');
            targetDiv.innerHTML = templates[status] || formCommon;
        }

        // Inisialisasi awal
        updateForm(statusSelect.value);

        // Event listener
        statusSelect.addEventListener('change', e => {
            updateForm(e.target.value);
        });
    });
</script>
