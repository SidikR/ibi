<div class="modal fade" id="modalTambahPelatihan" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <form id="formPelatihan" method="POST" action="{{ route('dashboard.' . roleName() . '.pelatihan.store') }}"
            enctype="multipart/form-data" novalidate>
            @method('POST')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pelatihan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="row">
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="jenis_pelatihan" class="form-label required">Jenis Pelatihan</label>
                                <select name="jenis_pelatihan" id="jenis_pelatihan" class="form-select" required>
                                    <option value="">-- Pilih Jenis Pelatihan --</option>
                                    @foreach (['IUD', 'IMPLAN', 'KONSELING KB', 'APN', 'CTU', 'PI', 'ASPIXIA', 'KIP-K', 'MTBM', 'MTBS', 'ABPK', 'PONED', 'PONEK', 'LAKTASI', 'KELAS BUMIL', 'BBLR', 'JABFUNG', 'POSKESDES DESA SIAGA', 'DDTK', 'IVA', 'RR-KB', 'ASKEB', 'KESPRO REMAJA', 'CTS', 'PPGDON'] as $jenis_pelatihan)
                                        <option value="{{ $jenis_pelatihan }}">{{ $jenis_pelatihan }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Jenis Pelatihan wajib dipilih.</div>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label for="tahun_pelatihan" class="form-label required">Tahun Pelatihan</label>
                                <input type="number" name="tahun_pelatihan" id="tahun_pelatihan" class="form-control"
                                    required>
                                <div class="invalid-feedback">Tahun Pelatihan wajib diisi.</div>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label class="form-label">Deskripsi Pelatihan</label>
                                <textarea class="form-control" name="deskripsi_pelatihan" id="deskripsi_pelatihan" cols="30" rows="6">{{ old('deskripsi_pelatihan') }}</textarea>
                                <div class="invalid-feedback">Deskripsi Pelatihan wajib diisi.</div>
                            </div>
                            

                            <div class="mb-3 col-12 col-lg-6">
                                <label class="form-label required">Upload Sertifikat (PDF)</label>
                                <input type="file" name="path_sertifikat" id="path_sertifikat" class="form-control"
                                    accept="application/pdf" required>
                                <div class="invalid-feedback">File wajib PDF dan maksimal 2MB.</div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary rounded-3">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Script Validasi --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('formPelatihan');
        const submitButton = form.querySelector('button[type="submit"]');
        const pathSertifikat = document.getElementById('path_sertifikat');
        const tahunPelatihan = document.querySelector('input[name="tahun_pelatihan"]');
        const jenisPelatihan = document.querySelector('input[name="jenis_pelatihan"]');

        function validateForm() {
            const form = document.querySelector('#modalTambahPelatihan form');
            let isValid = form.checkValidity();

            if (jenisPelatihan.value.trim() === "") {
                jenisPelatihan.setCustomValidity("Jenis Pelatihan wajib diisi.");
                isValid = false;
            } else {
                jenisPelatihan.setCustomValidity('');
            }

            if (tahunPelatihan.value.trim() === "") {
                tahunPelatihan.setCustomValidity("Tahun pelatihan wajib diisi.");
                isValid = false;
            } else if (tahunPelatihan.value.length !== 4) {
                tahunPelatihan.setCustomValidity("Tahun pelatihan harus terdiri dari 4 digit.");
                isValid = false;
            } else {
                tahunPelatihan.setCustomValidity('');
            }

            if (!isValid) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }

            form.classList.add('was-validated');
            return isValid;
        }

        // Validasi PDF khusus
        pathSertifikat.addEventListener('change', function() {
            const file = pathSertifikat.files[0];

            if (file) {
                const maxSize = 2 * 1024 * 1024; // 2 MB

                if (file.type !== 'application/pdf') {
                    pathSertifikat.setCustomValidity('File harus berupa PDF');
                } else if (file.size > maxSize) {
                    pathSertifikat.setCustomValidity('Ukuran file maksimal 2MB');
                } else {
                    pathSertifikat.setCustomValidity('');
                }
            } else {
                pathSertifikat.setCustomValidity('File wajib diunggah');
            }

            validateForm();
        });

        // Update tombol saat input berubah
        form.addEventListener('input', validateForm);
        form.addEventListener('change', validateForm);

        // Validasi saat submit
        form.addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault();
                form.classList.add('was-validated'); // aktifkan Bootstrap style merah
            }
        });

        validateForm(); // Jalankan saat awal
    });
</script>
