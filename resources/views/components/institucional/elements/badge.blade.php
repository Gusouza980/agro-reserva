@props([
    'bgColor' => 'bg-emerald-400',
    'textColor' => 'text-white',
    'rounded' => 'rounded-md'
])

<div {{ $attributes->merge(['class' => 'w-fit px-2 py-[3px] ' . $bgColor . ' ' . $rounded . ' ' . $textColor]) }}>
    {{ $slot }}
</div>