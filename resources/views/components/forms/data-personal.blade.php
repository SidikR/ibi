<form action="{{ route('dashboard.' . roleName() . '.data-personal.update') }}" method="POST">
    @csrf
<div class="row">
    @foreach ($fields as $field)
        <div class="mb-3 col-12 col-lg-6">
            <label for="{{ $field['name'] }}" class="form-label">
                {{ $field['label'] }}
                @if ($field['required'])
                    <span class="text-danger">*</span>
                @endif
            </label>

            @php
                $fieldName = $field['name'];
                $value = old($fieldName, $dataPersonal->{$fieldName} ?? '');
                $isInvalid = $errors->has($fieldName) ? 'is-invalid' : '';
                $required = $field['required'] ? 'required' : '';
                $disabled = $field['disabled'] ?? false ? 'disabled' : '';
            @endphp

            @switch($field['type'])
                @case('textarea')
                    <textarea name="{{ $fieldName }}" id="{{ $fieldName }}" rows="{{ $field['rows'] ?? 3 }}"
                        class="form-control {{ $isInvalid }}" {{ $required }} {{ $disabled }}>{{ $value }}</textarea>
                @break

                @case('date')
                    <input type="date" name="{{ $fieldName }}" id="{{ $fieldName }}"
                        value="{{ $value }}" class="form-control {{ $isInvalid }}"
                        {{ $required }} {{ $disabled }}>
                @break

                @case('select')
                    <select name="{{ $fieldName }}{{ $field['multiple'] ? '[]' : '' }}"
                        id="{{ $fieldName }}" class="form-control select2 {{ $isInvalid }}"
                        {{ $required }} {{ $disabled }}
                        {{ $field['multiple'] ? 'multiple' : '' }}>

                        @if (!($field['multiple'] ?? false))
                            <option value="">-- Pilih --</option>
                        @endif

                        @if ($field['grouped'] ?? false)
                            @foreach ($field['options'] as $groupLabel => $options)
                                <optgroup label="{{ $groupLabel }}">
                                    @foreach ($options as $key => $label)
                                        <option value="{{ $key }}"
                                            {{ in_array($key, (array) $value) ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        @else
                            @foreach ($field['options'] as $key => $label)
                                <option value="{{ $key }}"
                                    {{ in_array($key, (array) $value) ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                @break

                @default
                    <input type="{{ $field['type'] }}" name="{{ $fieldName }}"
                        id="{{ $fieldName }}" value="{{ $value }}"
                        class="form-control {{ $isInvalid }}" {{ $required }} {{ $disabled }}>
            @endswitch

            @error($fieldName)
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    @endforeach
</div>

    <button type="submit" class="btn btn-primary float-end rounded-3">Update</button>
</form>