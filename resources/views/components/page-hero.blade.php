@props([
    'title',
    'breadcrumb' => [],
    'image' => null,
    'position' => 'center',
])

@php
    $hasImage = filled($image);
@endphp

<section @class([
        'page-hero relative overflow-hidden border-b border-brand-600/40 pt-10 pb-14 lg:pt-14 lg:pb-16',
        'mesh-dark' => ! $hasImage,
        'bg-brand-800' => $hasImage,
    ])>
    @if($hasImage)
    <div class="page-hero__bg absolute inset-0 bg-cover bg-no-repeat"
         style="background-image: url('{{ $image }}'); background-position: {{ $position }};"
         aria-hidden="true"></div>
    <div class="page-hero__overlay absolute inset-0" aria-hidden="true"></div>
    @endif

    <div class="container-site relative z-10">
        @if(count($breadcrumb))
        <nav class="mb-5 text-sm text-brand-100/80" aria-label="Breadcrumb">
            <ol class="flex flex-wrap items-center gap-2">
                @foreach($breadcrumb as $item)
                    @if($loop->last)
                    <li class="font-medium text-white" aria-current="page">{{ $item['label'] }}</li>
                    @else
                    <li class="flex items-center gap-2">
                        <a href="{{ $item['url'] }}" class="hover:text-white">{{ $item['label'] }}</a>
                        <span aria-hidden="true" class="text-brand-200">/</span>
                    </li>
                    @endif
                @endforeach
            </ol>
        </nav>
        @endif
        <div class="max-w-3xl border-l-4 border-white/70 pl-5">
            <h1 class="font-display text-3xl font-bold tracking-tight text-white sm:text-4xl lg:text-5xl">{{ $title }}</h1>
            @if($slot->isNotEmpty())
            <p class="mt-4 text-lg text-brand-50/90">{{ $slot }}</p>
            @endif
        </div>
    </div>
</section>
