@props([
    'label',
    'name',
    'required' => false,
    'hint' => null,
])

@php
    $hasError = $errors->has($name);
@endphp

<div class="field">
    <label for="{{ $name }}" class="field__label">
        {{ $label }}
        @if ($required)
            <span class="field__req" aria-hidden="true">*</span>
        @endif
    </label>

    {{ $slot }}

    @if ($hint && ! $hasError)
        <p class="field__hint">{{ $hint }}</p>
    @endif

    @error($name)
        <p class="field__error" role="alert">
            <span>{{ $message }}</span>
        </p>
    @enderror
</div>
