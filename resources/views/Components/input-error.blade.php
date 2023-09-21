@props(['messages' => null])

<ul {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
    @if ($messages)
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    @endif
</ul>
