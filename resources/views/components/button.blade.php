@props([
     // default 
    'href' => '#',
    'color' => 'white', 
    'bg_color' => '500',
    'text' => 'teks',
    'radius' => 'md',
    'px' => '4',
    'py' => '2',
    'font_size' => 'md',
    'font_family' => 'sans',
    'font_dec' => 'semibold',
    'shadow' => 'none',
    'mt' => '0',
    'mb' => '0',
    'bg_hover' => 'red-500',
    'text_hover' => 'slate-500',
])

<a href="{{ $href }}" class="mt-{{$mt}}  mb-{{$mb}} hover:bg-{{$bg_hover}} hover:text-{{$text_hover}} px-{{$px}} font-{{$font_size}} font-{{$font_dec}} font-{{$font_family}}  py-{{$py}} shadow-{{$shadow}} rounded-{{$radius}} bg-{{$bg_color}} text-{{ $color }}">
    {{ $text }}
</a>