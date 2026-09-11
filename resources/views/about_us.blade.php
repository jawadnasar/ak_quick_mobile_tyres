@extends('layouts.app')

@php
    $tel = 'tel:+' . $company['phone_link'];
    $aboutHero = asset('front-theme/assets/img/about_hero.png');
@endphp

@section('content')
<x-page-hero
    title="About Us"
    :image="$aboutHero"
    position="center"
    :breadcrumb="[
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'About', 'url' => route('about-us')],
    ]"
>
    Mobile tyre assistance that comes to you: fast, reliable and available 24/7.
</x-page-hero>

<section class="section-padding bg-ink-50">
    <div class="container-site">
        <div class="grid items-center gap-12 lg:grid-cols-2">
            <div class="overflow-hidden rounded-xl border border-ink-200 bg-white p-8 sm:p-12">
                <img src="{{ asset('front-theme/assets/img/logo.png') }}"
                     alt="{{ $company['name'] }} logo"
                     class="mx-auto w-full max-w-sm object-contain"
                     loading="lazy"
                     width="400"
                     height="400">
            </div>
            <div>
                <p class="section-label">Our story</p>
                <h2 class="section-title">{{ $company['name'] }}</h2>
                <p class="mt-4 leading-relaxed text-ink-600">
                    When your tyre fails, you need help that comes to you, not a long search for an open garage.
                    We provide <strong class="text-ink-950">24/7 mobile tyre fitting</strong>, puncture repairs and roadside assistance
                    so you can get back on the road safely from the roadside, home, workplace or wherever you are stranded.
                </p>
                <p class="mt-4 leading-relaxed text-ink-600">
                    Our focus is simple: answer quickly, arrive prepared, quote clearly, and fit or repair properly with the right tools,
                    including for cars, EVs, vans and 4x4s.
                </p>
                <ul class="mt-6 space-y-3">
                    @foreach($whyUs as $point)
                    <li class="flex items-start gap-3">
                        <span class="mt-2 h-2 w-2 shrink-0 bg-brand-500" aria-hidden="true"></span>
                        <span class="text-ink-700">{{ $point }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section-padding mesh-dark">
    <div class="container-site text-center">
        <h2 class="font-display text-3xl font-bold tracking-tight text-white sm:text-4xl">Need a mobile tyre fitter now?</h2>
        <p class="mx-auto mt-4 max-w-xl text-ink-300">Call us anytime, including nights, weekends and bank holidays.</p>
        <a href="{{ $tel }}" class="btn-on-brand mt-8">Call {{ $company['phone'] }}</a>
    </div>
</section>
@endsection
