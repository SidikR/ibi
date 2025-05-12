<div class="modal fade" id="exportAnggotaModal" tabindex="-1" aria-labelledby="exportAnggotaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exportAnggotaModalLabel">Export Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('dashboard.' . roleName() . '.data_anggota.export') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        @foreach ($columns as $table => $fields)
                            <div class="col-15 col-md-4 mb-3">
                                <h5>
                                    {{ ucfirst($table) }}
                                    <input type="checkbox" class="form-check-input ms-2 select-all" 
                                        data-group="{{ $table }}" id="select_all_{{ $table }}">
                                    <label for="select_all_{{ $table }}" class="form-check-label">
                                        Select All
                                    </label>
                                </h5>
                                @foreach ($fields as $field => $label)
                                    <div class="form-check">
                                        <input class="form-check-input {{ $table }}-checkbox" type="checkbox" name="columns[]"
                                            id="{{ $table . '_' . $field }}" value="{{ $table . '.' . $field }}">
                                        <label class="form-check-label" for="{{ $table . '_' . $field }}">
                                            {{ $label }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Export Now</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle 'Select All' checkboxes
        document.querySelectorAll('.select-all').forEach(function (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', function () {
                const group = this.dataset.group;
                const checkboxes = document.querySelectorAll(`.${group}-checkbox`);
                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });
        });
    });
</script>
