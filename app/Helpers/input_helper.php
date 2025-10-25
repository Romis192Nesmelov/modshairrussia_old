<?php
/**
 * Sanity.CI.InputHelper
 * Version: 1.0.2 (19/03/2020)
 */
if (!function_exists('input_text')) {
    function input_text(string $name, string $type = 'text', ?string $value = '', array $data = [])
    {
        $config = [
            'name' => $name,
            'type' => $type,
            'value' => htmlspecialchars($value),
            'class' => !empty($data['class']) ? $data['class'] : null,
            'icon' => !empty($data['icon']) ? $data['icon'] : null,
            'label' => !empty($data['label']) ? $data['label'] : null,
            'ariaLabel' => !empty($data['ariaLabel']) ? $data['ariaLabel'] : null,
            'autocomplete' => !empty($data['autocomplete']) ? $data['autocomplete'] : null,
            'minlength' => !empty($data['minlength']) ? $data['minlength'] : null,
            'maxlength' => !empty($data['maxlength']) ? $data['maxlength'] : null,
            'required' => !empty($data['required']) ? $data['required'] : null,
            'placeholder' => !empty($data['placeholder']) ? $data['placeholder'] : null,
            'attributes' => !empty($data['attributes']) ? $data['attributes'] : null
        ];
        return view('Templates/input_text', $config);
    }
}
if (!function_exists('input_textarea')) {
    function input_textarea(string $name, string $value = '', array $data = [])
    {
        $config = [
            'name' => $name,
            'value' => esc($value),
            'class' => !empty($data['class']) ? $data['class'] : null,
            'icon' => !empty($data['icon']) ? $data['icon'] : null,
            'label' => !empty($data['label']) ? $data['label'] : null,
            'ariaLabel' => !empty($data['ariaLabel']) ? $data['ariaLabel'] : null,
            'autocomplete' => !empty($data['autocomplete']) ? $data['autocomplete'] : null,
            'minlength' => !empty($data['minlength']) ? $data['minlength'] : null,
            'maxlength' => !empty($data['maxlength']) ? $data['maxlength'] : null,
            'required' => !empty($data['required']) ? $data['required'] : null,
            'placeholder' => !empty($data['placeholder']) ? $data['placeholder'] : null,
            'rows' => !empty($data['rows']) ? $data['rows'] : null,
            'cols' => !empty($data['cols']) ? $data['cols'] : null,
        ];
        return view('Templates/input_textarea', $config);
    }
}
if (!function_exists('input_radio')) {
    function input_radio(string $name, array $values, array $data = [])
    {
        $config = [
            'name' => $name,
            'class' => !empty($data['class']) ? $data['class'] : null,
            'title' => !empty($data['title']) ? $data['title'] : null,
            'ariaLabel' => !empty($data['ariaLabel']) ? $data['ariaLabel'] : null,
            'values' => $values,
            'checkbox' => !empty($data['checkbox']) && $data['checkbox'] ? true : false,
        ];

        return view('Templates/input_radio', $config);
    }
}
if (!function_exists('input_checkbox')) {
    function input_checkbox(string $name, array $values, array $data = [])
    {
        $data['checkbox'] = true;
        return input_radio($name, $values, $data);
    }
}