<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function createField(string $name, string $label, string $type, bool $required, array $extra = [],  bool $disabled = false): array
    {
        return array_merge([
            'name' => $name,
            'label' => $label,
            'type' => $type,
            'required' => $required,
            'disabled' => $disabled,
        ], $extra);
    }

    /**
     * Membuat field select (dropdown) dengan opsi.
     */
    protected function createSelectField(string $name, string $label, bool $required, array $options, bool $multiple = false,  bool $disabled = false, bool $grouped = false): array
    {
        return [
            'name' => $name,
            'label' => $label,
            'type' => 'select',
            'required' => $required,
            'options' => array_combine($options, $options),
            'multiple' => $multiple,
            'disabled' => $disabled,
            'grouped' => $grouped,
        ];
    }
}
