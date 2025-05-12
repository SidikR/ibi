<div class="modal fade" id="modalTambahPendidikanProfesi" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <form id="formPendidikanProfesi" method="POST"
            action="{{ route('dashboard.' . roleName() . '.pendidikan-profesi.store') }}" enctype="multipart/form-data"
            novalidate>
            @method('POST')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pendidikan Profesi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <fieldset>
                        <div class="row">
                            <div class="mb-3 col-12 col-lg-6">
                                <label for="jenjangProfesi" class="form-label required">Jenjang</label>
                                <select name="jenjang" id="jenjangProfesi" class="form-select" required>
                                    <option value="">-- Pilih Jenjang --</option>
                                    @foreach (['D3', 'D4', 'S1', 'S2', 'S3'] as $jenjang)
                                        <option value="{{ $jenjang }}">{{ $jenjang }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Jenjang wajib dipilih.</div>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label for="jurusanProfesi" class="form-label required">Jurusan</label>
                                <input type="text" name="jurusan" id="jurusanProfesi" class="form-control" required>
                                <div class="invalid-feedback">Jurusan wajib diisi.</div>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label class="form-label required">Nama Perguruan</label>
                                <input type="text" name="nama_pt" id="nama_ptProfesi" class="form-control" value="{{ old('nama_pt') }}"
                                    required>
                                <div class="invalid-feedback">Nama perguruan wajib diisi.</div>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label class="form-label required">Alamat Perguruan</label>
                                <input type="text" name="alamat_pt" id="alamat_ptProfesi" class="form-control" value="{{ old('alamat_pt') }}"
                                    required>
                                <div class="invalid-feedback">Alamat perguruan wajib diisi.</div>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label class="form-label required">Tahun Lulus</label>
                                <input type="number" id="tahun_lulusProfesi" name="tahun_lulus" class="form-control" maxlength="4" required
                                    min="1000" max="9999">
                                <div class="invalid-feedback"> Tahun harus terdiri dari 4 digit angka (misalnya: 2024).
                                </div>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label class="form-label required">No Ijazah</label>
                                <input type="text" name="no_ijazah" id="no_ijazahProfesi" required class="form-control"
                                    value="{{ old('no_ijazah') }}">
                            </div>

                            <div class="mb-3 col-12">
                                <label class="form-label required">Upload Ijazah (PDF)</label>
                                <input type="file" name="path_ijazah" id="path_ijazahProfesi" class="form-control"
                                    accept="application/pdf" required>
                                <div class="invalid-feedback">File wajib PDF dan maksimal 2MB.</div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="submitProfesi" class="btn btn-primary rounded-3">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Script Validasi --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const formProfesi = document.getElementById('formPendidikanProfesi');
        const submitButtonProfesi = document.getElementById('submitProfesi');
        const fileInputProfesi = document.getElementById('path_ijazahProfesi');
        const tahunLulusInputProfesi = document.getElementById('tahun_lulusProfesi');
        const alamatInputProfesi = document.getElementById('alamat_ptProfesi');
        const noIjazahProfesi = document.getElementById('no_ijazahProfesi');

        function validateFormProfesi() {
    const formProfesi = document.querySelector('#modalTambahPendidikanProfesi form');
    let isValid = formProfesi.checkValidity();

    // Validasi alamat
    if (alamatInputProfesi.value.trim() === "") {
        alamatInputProfesi.setCustomValidity("Alamat perguruan wajib diisi.");
        isValid = false;
    } else {
        alamatInputProfesi.setCustomValidity('');
    }

    // Validasi no ijazah
    if (noIjazahProfesi.value.trim() === "") {
        noIjazahProfesi.setCustomValidity("No Ijazah wajib diisi.");
        isValid = false;
    } else {
        noIjazahProfesi.setCustomValidity('');
    }

    // Validasi tahun lulus
    if (tahunLulusInputProfesi.value.trim() === "") {
        tahunLulusInputProfesi.setCustomValidity("Tahun lulus wajib diisi.");
        isValid = false;
    } else if (tahunLulusInputProfesi.value.length !== 4) {
        tahunLulusInputProfesi.setCustomValidity("Tahun lulus harus terdiri dari 4 digit.");
        isValid = false;
    } else {
        tahunLulusInputProfesi.setCustomValidity('');
    }

    // Validasi file PDF
    const file = fileInputProfesi.files[0];
    if (file) {
        const maxSize = 2 * 1024 * 1024;
        if (file.type !== 'application/pdf') {
            fileInputProfesi.setCustomValidity('File harus berupa PDF');
            isValid = false;
        } else if (file.size > maxSize) {
            fileInputProfesi.setCustomValidity('Ukuran file maksimal 2MB');
            isValid = false;
        } else {
            fileInputProfesi.setCustomValidity('');
        }
    } else {
        fileInputProfesi.setCustomValidity('File wajib diunggah');
        isValid = false;
    }

    // Enable/disable tombol submit
    submitButtonProfesi.disabled = !isValid;

    formProfesi.classList.add('was-validated');
    return isValid;
}


        // Cek validasi saat ada perubahan input
        formProfesi.addEventListener('input', validateFormProfesi);
        formProfesi.addEventListener('change', validateFormProfesi);

        formProfesi.addEventListener('submit', function(e) {
            if (!validateFormProfesi()) {
                e.preventDefault();
            }
        });

        validateFormProfesi(); // Jalankan saat awal
    });
</script>

