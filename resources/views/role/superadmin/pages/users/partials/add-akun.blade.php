<div class="modal fade" id="addAkun" tabindex="-1" aria-labelledby="addAkunLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAkunLabel">Tambah Akun Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.' . roleName() . '.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
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
                                    <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto" width="100"
                                        class="mt-2">
                                @endif
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label for="status_keanggotaan">Status Keanggotaan</label>
                                <select name="status_keanggotaan" class="form-control">
                                    <option value="1"
                                        {{ old('status_keanggotaan', $user->status_keanggotaan ?? 1) == 1 ? 'selected' : '' }}>
                                        Aktif</option>
                                    <option value="0"
                                        {{ old('status_keanggotaan', $user->status_keanggotaan ?? 1) == 0 ? 'selected' : '' }}>
                                        Tidak Aktif</option>
                                </select>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label for="role_id">Role</label>
                                <select name="role_id" class="form-control">
                                    <option value="">-- Pilih Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"
                                            {{ old('role_id', $user->role_id ?? '') == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-12 col-lg-6">
                                <label for="ranting_id">Ranting</label>
                                <select name="ranting_id" class="form-control">
                                    <option value="">-- Pilih Ranting --</option>
                                    @foreach ($rantings as $ranting)
                                        <option value="{{ $ranting->id }}"
                                            {{ old('ranting_id', $user->ranting_id ?? '') == $ranting->id ? 'selected' : '' }}>
                                            {{ $ranting->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if (!isset($user))
                                <div class="mb-3 col-12 col-lg-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            @endif

                        </div>
                    </fieldset>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
