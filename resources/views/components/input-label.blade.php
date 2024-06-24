@props(['value'])

<label {{ $attributes->merge(['class' => ' font-medium text-sm']) }}>
    {{ $value ?? $slot }}
</label>
