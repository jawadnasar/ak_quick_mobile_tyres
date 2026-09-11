@props(['label' => null, 'title', 'subtitle' => null, 'centered' => true, 'onDark' => false])

{{-- onDark: use when section background is black --}}
<div @class(['text-center mx-auto' => $centered, 'max-w-3xl' => $centered])>
    @if($label)
    <p @class(['section-label', 'text-brand-500' => $onDark])>{{ $label }}</p>
    @endif
    <h2 @class(['section-title', 'text-white' => $onDark])>{{ $title }}</h2>
    @if($subtitle)
    <p @class(['section-subtitle', 'mx-auto' => $centered, 'text-ink-300' => $onDark])>{{ $subtitle }}</p>
    @endif
</div>
