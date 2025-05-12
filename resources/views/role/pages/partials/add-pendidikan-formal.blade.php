<div class="modal fade" id="modalTambahPendidikanFormal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <form id="formPendidikanFormal" method="POST"
            action="{{ route('dashboard.' . roleName() . '.pendidikan-formal.store') }}" enctype="multipart/form-data"
            novalidate>
            @method('POST')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pendidikan Formal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="row">
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="jenjang" class="form-label required">Jenjang</label>
                                <select name="jenjang" id="jenjang" class="form-select" required>
                                    <option value="">-- Pilih Jenjang --</option>
                                    @foreach (['SD', 'SMP', 'SMA/SMK', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3'] as $jenjang)
                                        <option value="{{ $jenjang }}">{{ $jenjang }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Jenjang wajib dipilih.</div>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label for="jurusan" class="form-label required">Jurusan</label>
                                <input type="text" name="jurusan" id="jurusan" class="form-control" required>
                                <div class="invalid-feedback">Jurusan wajib diisi.</div>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label class="form-label required">Nama Perguruan</label>
                                <input type="text" name="nama_pt" class="form-control" value="{{ old('nama_pt') }}"
                                    required>
                                <div class="invalid-feedback">Nama perguruan wajib diisi.</div>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label class="form-label required">Alamat Perguruan</label>
                                <input type="text" name="alamat_pt" class="form-control" value="{{ old('alamat_pt') }}"
                                    required>
                                <div class="invalid-feedback">Alamat perguruan wajib diisi.</div>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label class="form-label required">Tahun Lulus</label>
                                <input type="number" name="tahun_lulus" class="form-control" maxlength="4" required
                                    min="1000" max="9999">
                                <div class="invalid-feedback"> Tahun harus terdiri dari 4 digit angka (misalnya: 2024).
                                </div>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label class="form-label required">No Ijazah</label>
                                <input type="text" name="no_ijazah" required class="form-control"
                                    value="{{ old('no_ijazah') }}">
                            </div>

                            <div class="mb-3 col-12">
                                <label class="form-label required">Upload Ijazah (PDF)</label>
                                <input type="file" name="path_ijazah" id="path_ijazah" class="form-control"
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
        const form = document.getElementById('formPendidikanFormal');
        const submitButton = form.querySelector('button[type="submit"]');
        const fileInput = document.getElementById('path_ijazah');
        const tahunLulusInput = document.querySelector('input[name="tahun_lulus"]');
        const alamatInput = document.querySelector('input[name="alamat_pt"]');
        const noIjazah = document.querySelector('input[name="no_ijazah"]');

        function validateForm() {
            const form = document.querySelector('#modalTambahPendidikanFormal form');
            let isValid = form.checkValidity();

            if (alamatInput.value.trim() === "") {
                alamatInput.setCustomValidity("Alamat perguruan wajib diisi.");
                isValid = false;
            } else {
                alamatInput.setCustomValidity('');
            }

            if (noIjazah.value.trim() === "") {
                noIjazah.setCustomValidity("No Ijazah wajib diisi.");
                isValid = false;
            } else {
                noIjazah.setCustomValidity('');
            }

            if (tahunLulusInput.value.trim() === "") {
                tahunLulusInput.setCustomValidity("Tahun lulus wajib diisi.");
                isValid = false;
            } else if (tahunLulusInput.value.length !== 4) {
                tahunLulusInput.setCustomValidity("Tahun lulus harus terdiri dari 4 digit.");
                isValid = false;
            } else {
                tahunLulusInput.setCustomValidity('');
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
        fileInput.addEventListener('change', function() {
            const file = fileInput.files[0];

            if (file) {
                const maxSize = 2 * 1024 * 1024; // 2 MB

                if (file.type !== 'application/pdf') {
                    fileInput.setCustomValidity('File harus berupa PDF');
                } else if (file.size > maxSize) {
                    fileInput.setCustomValidity('Ukuran file maksimal 2MB');
                } else {
                    fileInput.setCustomValidity('');
                }
            } else {
                fileInput.setCustomValidity('File wajib diunggah');
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
