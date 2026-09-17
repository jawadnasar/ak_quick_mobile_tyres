@extends('layouts.app')

@php
    $tel = 'tel:+' . $company['phone_link'];
@endphp

@push('head')
<link rel="preload" as="image" href="{{ asset('front-theme/assets/img/hero.jpg') }}" fetchpriority="high">
@endpush

@section('content')
{{-- Hero: full-bleed photo background --}}
<section class="hero-home" aria-label="{{ $company['name'] }}: 24/7 mobile tyre fitting">
    <div class="hero-home__bg"
         style="background-image: url('{{ asset('front-theme/assets/img/hero.jpg') }}');"
         aria-hidden="true"></div>
    <div class="hero-home__overlay" aria-hidden="true"></div>
    <div class="hero-home__grain" aria-hidden="true"></div>

    <div class="container-site relative z-10 flex min-h-[inherit] flex-col justify-end py-14 sm:justify-center sm:py-16 lg:py-20">
        <div class="max-w-xl animate-fade-in-up sm:max-w-2xl lg:max-w-3xl">
            <p class="font-display text-sm font-semibold uppercase tracking-[0.22em] text-brand-100 sm:text-base">
                {{ $company['name'] }}
            </p>
            <h1 class="mt-4 font-display text-3xl font-extrabold leading-[1.08] tracking-tight text-white sm:mt-5 sm:text-5xl lg:text-6xl text-balance">
                Mobile tyre fitting that comes to you
            </h1>
            <p class="mt-4 max-w-xl text-sm leading-relaxed text-ink-200 sm:mt-6 sm:text-base sm:text-ink-300 lg:text-lg">
                Emergency roadside assistance, puncture repair and on-the-spot fitting, day or night, wherever you are.
            </p>
            <div class="mt-8 flex flex-col gap-3 sm:mt-10 sm:flex-row sm:items-center">
                <a href="{{ $tel }}" class="btn-call px-8 py-3.5 text-base">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    Call {{ $company['phone'] }}
                </a>
                <a href="#services" class="btn-secondary-invert px-8 py-3.5 text-base">View services</a>
            </div>
        </div>
    </div>
</section>

{{-- Stats (below first viewport) --}}
<section class="stat-bar" aria-label="Key facts">
    <div class="container-site">
        <dl class="grid grid-cols-1 divide-y divide-ink-200 sm:grid-cols-3 sm:divide-x sm:divide-y-0">
            @foreach($stats as $stat)
            <div class="flex flex-col items-center justify-center px-4 py-6 text-center sm:py-8">
                <dt class="font-display text-2xl font-extrabold tracking-tight text-brand-500 sm:text-3xl">
                    {{ $stat['value'] }}{{ $stat['suffix'] ?? '' }}
                </dt>
                <dd class="mt-2 text-xs font-semibold uppercase tracking-[0.16em] text-ink-600">{{ $stat['label'] }}</dd>
            </div>
            @endforeach
        </dl>
    </div>
</section>

{{-- Services --}}
<section class="section-padding bg-ink-50" id="services">
    <div class="container-site">
        <x-section-header
            title="What we do"
            subtitle="One call and we bring the workshop to your wheel."
            :centered="false"
        />
        <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($services as $service)
            <a href="{{ route('services.show', $service['slug']) }}" class="service-card group block">
                <span class="service-icon" aria-hidden="true">
                    <i class="{{ $service['icon'] }}"></i>
                </span>
                <h3 class="mt-4 font-display text-lg font-bold tracking-tight text-ink-950">{{ $service['title'] }}</h3>
                <p class="mt-3 text-sm leading-relaxed text-ink-500">{{ $service['short_description'] }}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Recent Jobs --}}
@if(count($jobImages))
<section class="section-padding !pt-4 bg-white" id="recent-jobs" aria-labelledby="recent-jobs-heading">
    <div class="container-site">
        <h2 id="recent-jobs-heading" class="section-title !mt-0">Recent jobs</h2>
        <div class="mt-10 grid grid-cols-2 gap-3 sm:gap-4 md:grid-cols-3 lg:grid-cols-4">
            @foreach($jobImages as $image)
            <figure class="aspect-[4/3] overflow-hidden rounded-lg bg-ink-100">
                <img src="{{ $image['src'] }}"
                     alt="{{ $image['alt'] }}"
                     class="h-full w-full object-cover transition duration-500 hover:scale-105"
                     loading="lazy"
                     decoding="async"
                     width="400"
                     height="300">
            </figure>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Why Choose Us --}}
<section class="section-padding bg-white" id="why-us">
    <div class="container-site">
        <div class="grid items-start gap-10 lg:grid-cols-2 lg:gap-16">
            <div>
                <h2 class="section-title !mt-0">Why drivers call us</h2>
                <ul class="mt-8 space-y-4">
                    @foreach($whyUs as $point)
                    <li class="flex items-start gap-3">
                        <span class="mt-2 h-2 w-2 shrink-0 bg-brand-500" aria-hidden="true"></span>
                        <span class="text-base text-ink-700 sm:text-lg">{{ $point }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <aside class="cta-panel" aria-labelledby="need-tyre-now">
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-brand-100">24/7 response</p>
                <h2 id="need-tyre-now" class="mt-3 font-display text-2xl font-extrabold tracking-tight text-white sm:text-3xl">Need a tyre now?</h2>
                <p class="mt-3 text-brand-50/90">Tell us your location and tyre size. We do the rest.</p>
                <a href="{{ $tel }}" class="btn-on-brand mt-8 w-full px-8 py-3.5 text-base sm:w-auto">
                    <i class="fa-solid fa-phone" aria-hidden="true"></i>
                    Call {{ $company['phone'] }}
                </a>
                @if(!empty($company['google_business']))
                <a href="{{ $company['google_business'] }}" target="_blank" rel="noopener noreferrer" class="btn-secondary-invert mt-3 w-full px-8 py-3.5 text-base sm:ml-3 sm:mt-8 sm:w-auto">
                    Find us on Google
                </a>
                @else
                <a href="{{ route('contact') }}" class="btn-secondary-invert mt-3 w-full px-8 py-3.5 text-base sm:ml-3 sm:mt-8 sm:w-auto">
                    Contact us
                </a>
                @endif
            </aside>
        </div>
    </div>
</section>

{{-- How It Works --}}
<section class="section-padding bg-ink-50" id="how-it-works">
    <div class="container-site">
        <x-section-header
            title="How it works"
            subtitle="Emergency tyre help made simple: four clear steps from call to back on the road."
        />

        <figure class="mt-10 overflow-hidden rounded-xl border border-brand-100 bg-white shadow-soft">
            <div class="overflow-x-auto">
                <img src="{{ asset('front-theme/assets/img/steps.jpg') }}"
                     alt="How it works: initial contact, we come to you, we fix the problem, then back on the road"
                     class="h-auto w-full min-w-[40rem] object-contain object-top sm:min-w-0"
                     width="1400"
                     height="700"
                     loading="lazy"
                     decoding="async">
            </div>
            <figcaption class="sr-only">
                Four steps: Initial Contact, We Come To You, We Fix the Problem, Back on the Road.
            </figcaption>
        </figure>

        <ol class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($process as $step)
            <li class="rounded-lg border border-brand-100 bg-white p-4 shadow-soft">
                <span class="font-display text-sm font-bold uppercase tracking-wider text-brand-500">Step {{ $step['step'] }}</span>
                <h3 class="mt-1 font-display text-base font-bold tracking-tight text-ink-950">{{ $step['title'] }}</h3>
                <p class="mt-2 text-sm leading-relaxed text-ink-500">{{ $step['description'] }}</p>
            </li>
            @endforeach
        </ol>
    </div>
</section>

{{-- About --}}
<section class="section-padding bg-white" id="about">
    <div class="container-site">
        <div class="mx-auto max-w-3xl text-center">
            <p class="section-label">About us</p>
            <h2 class="section-title">Fast, reliable mobile tyre assistance</h2>
            <p class="mt-5 text-base leading-relaxed text-ink-600 sm:text-lg">
                <strong class="text-ink-950">{{ $company['name'] }}</strong> is here for drivers who need tyre help without the hassle of finding a garage.
                Whether you have a flat at the roadside, a puncture on the driveway, or need a replacement at work, our mobile team comes directly to you,
                with the tools, tyres and experience to get you moving again.
            </p>
            <a href="{{ route('about-us') }}" class="btn-secondary-outline mt-8">More about us</a>
        </div>
    </div>
</section>

{{-- Service Area --}}
<section class="section-padding bg-ink-50" id="service-area">
    <div class="container-site">
        <div class="mx-auto max-w-3xl text-center">
            <h2 class="section-title !mt-0">Wherever you need us</h2>
            <p class="mt-5 text-base leading-relaxed text-ink-600 sm:text-lg">
                Stranded at the roadside, at home, at work or another location. Our mobile tyre team comes directly to you.
                Call with your location and we will confirm attendance and an arrival estimate.
            </p>
        </div>
    </div>
</section>

{{-- Emergency CTA --}}
<section class="section-padding mesh-dark" id="emergency-cta">
    <div class="container-site">
        <div class="mx-auto max-w-3xl text-center">
            <h2 class="font-display text-3xl font-extrabold tracking-tight text-white sm:text-4xl text-balance">
                Tyre trouble? Don’t get stranded.
            </h2>
            <p class="mx-auto mt-4 max-w-2xl text-brand-50/90">
                Available 24/7 for emergency mobile tyre assistance, puncture repair and on-the-spot fitting.
            </p>
            <a href="{{ $tel }}" class="btn-on-brand mt-8 px-10 py-4 text-base">
                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                Call {{ $company['name'] }} now
            </a>
            <p class="mt-4 font-display text-xl font-bold text-white">{{ $company['phone'] }}</p>
        </div>
    </div>
</section>

{{-- Contact strip --}}
<section class="section-padding bg-white" id="contact">
    <div class="container-site">
        <x-section-header
            title="Contact"
            subtitle="Need help now? Call us anytime. We are ready around the clock."
        />
        <div class="mx-auto mt-12 grid max-w-4xl gap-4 sm:grid-cols-2">
            <div class="service-card">
                <h3 class="font-display text-sm font-semibold uppercase tracking-wider text-ink-500">Phone · 24/7</h3>
                <a href="{{ $tel }}" class="mt-3 block font-display text-2xl font-bold text-ink-950 hover:text-brand-700">{{ $company['phone'] }}</a>
                <p class="mt-2 text-sm text-ink-500">{{ $company['availability'] }}</p>
            </div>
            <div class="service-card">
                <h3 class="font-display text-sm font-semibold uppercase tracking-wider text-ink-500">Service</h3>
                <p class="mt-3 text-lg font-semibold text-ink-950">Mobile: we come to you</p>
                <p class="mt-2 text-sm text-ink-500">{{ $company['address'] }}</p>
                @if(!empty($company['email']))
                <a href="mailto:{{ $company['email'] }}" class="mt-3 inline-block text-sm font-medium text-ink-950 underline decoration-brand-500 underline-offset-2">{{ $company['email'] }}</a>
                @endif
            </div>
        </div>
        <div class="mt-10 text-center">
            <a href="{{ route('contact') }}" class="btn-secondary-outline">Full contact page</a>
        </div>
    </div>
</section>

{{-- Quote request --}}
<x-quote-form id="quote" />

{{-- FAQ --}}
<section class="section-padding bg-white" id="faq" x-data="faq()">
    <div class="container-site">
        <x-section-header
            title="Common questions"
            subtitle="Quick answers before you call, or call us anytime for urgent help."
        />
        <div class="mx-auto mt-12 max-w-3xl space-y-3">
            @foreach($faqs as $index => $faq)
            <div class="overflow-hidden rounded-lg border border-ink-200 bg-white">
                <button type="button"
                        class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left"
                        @click="toggle({{ $index }})"
                        :aria-expanded="active === {{ $index }}">
                    <span class="font-semibold text-ink-950">{{ $faq['question'] }}</span>
                    <svg class="h-5 w-5 shrink-0 text-brand-500 transition" :class="active === {{ $index }} && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="active === {{ $index }}" x-transition style="display: none;">
                    <p class="border-t border-ink-100 px-5 py-4 text-sm leading-relaxed text-ink-600">{{ $faq['answer'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
