<button {{ $attributes->merge(['class' => 'nav-link', 'data-bs-toggle' => 'tab']) }}>
    {{ $slot }}
</button>
