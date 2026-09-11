@extends('layouts.app')

@php
    $tel = 'tel:+' . $company['phone_link'];
    $quoteHero = asset('front-theme/assets/img/contact_hero.png');
@endphp

@section('content')
<x-page-hero
    title="Request a Quote"
    :image="$quoteHero"
    position="center"
    :breadcrumb="[
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Request a Quote', 'url' => route('quote')],
    ]"
>
    Tell us what you need and we will get back with clear options and pricing.
</x-page-hero>

<section class="section-padding bg-ink-50">
    <div class="container-site">
        <div class="grid items-start gap-8 lg:grid-cols-12 lg:gap-10">
            <div class="space-y-6 lg:col-span-4">
                <div class="cta-panel">
                    <p class="text-sm font-semibold uppercase tracking-[0.14em] text-brand-100">Prefer to talk?</p>
                    <a href="{{ $tel }}" class="mt-4 block font-display text-3xl font-extrabold text-white transition hover:text-brand-50">
                        {{ $company['phone'] }}
                    </a>
                    <p class="mt-3 text-brand-100">{{ $company['availability'] }}</p>
                    <a href="{{ $tel }}" class="btn-on-brand mt-8 w-full sm:w-auto">
                        <i class="fa-solid fa-phone" aria-hidden="true"></i>
                        Call Now
                    </a>
                    <p class="mt-6 text-sm leading-relaxed text-brand-100/80">
                        For emergencies, calling is fastest. Use the form for non-urgent quotes and planned fittings.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-8">
                <x-quote-form id="quote" :compact="true" />
            </div>
        </div>
    </div>
</section>
@endsection
