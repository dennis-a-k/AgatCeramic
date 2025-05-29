{{-- vendor/laravel/breeze/stubs/default/resources/views/components/input-error.blade.php --}}
@props(['messages', 'class' => ''])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1 ' . $class]) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
