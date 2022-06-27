@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-white-600']) }}>
        {{ $status }}
    </div>
@endif
