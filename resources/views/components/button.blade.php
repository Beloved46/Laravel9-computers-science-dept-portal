<button {{ $attributes->merge(['type' => 'submit', 'class' => 'button primary small']) }}>
    {{ $slot }}
</button>
