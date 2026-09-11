@extends('layouts.app')

@php
    $tel = 'tel:+' . config('company.phone_link');
    $servicesHero = asset('front-theme/assets/img/services_hero.png');
@endphp

@section('content')
<x-page-hero
    title="Our Services"
    :image="$servicesHero"
    position="center"
    :breadcrumb="[
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Services', 'url' => route('services')],
    ]"
>
    Emergency callouts, mobile tyre fitting, puncture repairs and more, brought to your location 24/7.
</x-page-hero>

<section class="section-padding bg-ink-50">
    <div class="container-site">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($services as $service)
            <a href="{{ route('services.show', $service['slug']) }}" class="service-card group block">
                <div class="flex items-start justify-between gap-3">
                    <span class="service-icon" aria-hidden="true">
                        <i class="{{ $service['icon'] }}"></i>
                    </span>
                    <span class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">{{ $service['category'] }}</span>
                </div>
                <h2 class="mt-4 font-display text-xl font-bold tracking-tight text-ink-950">{{ $service['title'] }}</h2>
                <p class="mt-3 text-sm leading-relaxed text-ink-500">{{ $service['short_description'] }}</p>
                <span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-brand-500">
                    View details
                    <i class="fa-solid fa-arrow-right text-xs transition group-hover:translate-x-1" aria-hidden="true"></i>
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section class="section-padding mesh-dark">
    <div class="container-site text-center">
        <h2 class="font-display text-2xl font-bold tracking-tight text-white sm:text-3xl">Tyre problem right now?</h2>
        <p class="mx-auto mt-4 max-w-xl text-brand-100">Call our mobile team. We will confirm location, options and an arrival estimate.</p>
        <a href="{{ $tel }}" class="btn-on-brand mt-8">
            <i class="fa-solid fa-phone" aria-hidden="true"></i>
            Call {{ config('company.phone') }}
        </a>
    </div>
</section>
@endsection
