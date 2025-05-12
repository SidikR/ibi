<div class="modal fade" id="addRanting" tabindex="-1" aria-labelledby="addRantingLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRantingLabel">Tambah Ranting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.' . roleName() . '.rantings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <fieldset>
                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="name">Nama Ranting</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $ranting->name ?? '') }}" required>
                            </div>
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
