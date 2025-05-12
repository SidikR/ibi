<div class="modal fade" id="updatePassword{{ $item->id }}" tabindex="-1"
    aria-labelledby="updatePassword{{ $item->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePassword{{ $item->id }}Label">Edit Akun Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.' . roleName() . '.users.updatePassword', ['user' => $item]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <fieldset>
                        <div class="row">
                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Tuliskan password baru" />
                                    <span class="input-group-text toggle-password" data-target="#password"
                                        style="cursor: pointer;">
                                        👁️
                                    </span>
                                </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation" placeholder="Tulis ulang password" />
                                    <span class="input-group-text toggle-password" data-target="#password_confirmation"
                                        style="cursor: pointer;">
                                        👁️
                                    </span>
                                </div>
                                <small id="password-match-message" class="form-text text-danger d-none">Password tidak
                                    cocok.</small>
                            </div>

                        </div>
                    </fieldset>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.toggle-password').forEach(function(el) {
        el.addEventListener('click', function() {
            const target = document.querySelector(el.getAttribute('data-target'));
            if (target.type === 'password') {
                target.type = 'text';
                el.innerHTML = '🙈'; // Ganti icon jika ingin
            } else {
                target.type = 'password';
                el.innerHTML = '👁️';
            }
        });
    });

    const password = document.getElementById('password');
    const passwordConfirmation = document.getElementById('password_confirmation');
    const matchMessage = document.getElementById('password-match-message');

    passwordConfirmation.addEventListener('input', function() {
        if (password.value !== passwordConfirmation.value) {
            matchMessage.classList.remove('d-none');
        } else {
            matchMessage.classList.add('d-none');
        }
    });
</script>
