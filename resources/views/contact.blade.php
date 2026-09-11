@extends('layouts.app')

@php
    $tel = 'tel:+' . $company['phone_link'];
    $hasEmail = !empty($company['email']);
    $contactHero = asset('front-theme/assets/img/contact_hero.png');
@endphp

@section('content')
<x-page-hero
    title="Contact Us"
    :image="$contactHero"
    position="center"
    :breadcrumb="[
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Contact', 'url' => route('contact')],
    ]"
>
    Tyre emergency? Call us anytime. We come to you.
</x-page-hero>

<section class="section-padding bg-ink-50">
    <div class="container-site">
        <div class="grid items-start gap-8 lg:grid-cols-12 lg:gap-10">
            <div class="space-y-6 lg:col-span-5">
                <div class="cta-panel">
                    <p class="text-sm font-semibold uppercase tracking-[0.14em] text-brand-100">24/7 Emergency Call</p>
                    <a href="{{ $tel }}" class="mt-4 block font-display text-3xl font-extrabold text-white transition hover:text-brand-50 sm:text-4xl">
                        {{ $company['phone'] }}
                    </a>
                    <p class="mt-3 text-brand-100">{{ $company['availability'] }}</p>
                    <a href="{{ $tel }}" class="btn-on-brand mt-8 w-full px-8 py-3.5 text-base sm:w-auto">
                        <i class="fa-solid fa-phone" aria-hidden="true"></i>
                        Call Now
                    </a>
                    <p class="mt-6 text-sm leading-relaxed text-brand-100/80">
                        Tell us your location and tyre size when you call. We will confirm options and an arrival estimate.
                    </p>
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1">
                    <div class="service-card">
                        <h2 class="font-display text-sm font-semibold uppercase tracking-wider text-ink-500">Phone</h2>
                        <a href="{{ $tel }}" class="mt-2 block text-lg font-semibold text-ink-950 hover:text-brand-600">{{ $company['phone'] }}</a>
                        <p class="mt-1 text-sm text-ink-500">Fastest way to get help</p>
                    </div>
                    <div class="service-card">
                        <h2 class="font-display text-sm font-semibold uppercase tracking-wider text-ink-500">Availability</h2>
                        <p class="mt-2 text-lg font-semibold text-ink-950">{{ $company['availability'] }}</p>
                        <p class="mt-1 text-sm text-ink-500">Nights, weekends &amp; bank holidays</p>
                    </div>
                    <div class="service-card sm:col-span-2 lg:col-span-1">
                        <h2 class="font-display text-sm font-semibold uppercase tracking-wider text-ink-500">Service area</h2>
                        <p class="mt-2 text-lg font-semibold text-ink-950">Mobile: we come to you</p>
                        <p class="mt-1 text-sm text-ink-500">{{ $company['address'] }}</p>
                        @if($hasEmail)
                        <a href="mailto:{{ $company['email'] }}" class="mt-3 inline-block text-sm font-medium text-brand-500 hover:underline">{{ $company['email'] }}</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7">
                <x-quote-form id="quote" :compact="true" />
            </div>
        </div>
    </div>
</section>
@endsection
