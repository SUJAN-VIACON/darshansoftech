@props(['disabled' => false])

<input type="file" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'file-input file-input-bordered w-full mt-1']) !!}>

