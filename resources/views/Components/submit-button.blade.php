<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary']) }} type="submit">
    {{ $slot }}
</button>
