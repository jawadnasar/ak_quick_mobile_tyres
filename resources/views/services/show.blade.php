@extends('layouts.app')

@php
    $tel = 'tel:+' . config('company.phone_link');
@endphp

@section('content')
@php
    $isEmergency = $service['slug'] === 'emergency-callout';
    $isPuncture = $service['slug'] === 'puncture-repairs';
    $isLocking = $service['slug'] === 'locking-nut-removal';
    $isWheels = $service['slug'] === 'wheel-swaps-spares';
    $isLongform = $isEmergency || $isPuncture || $isLocking || $isWheels;
    $heroTitle = $service['title'];
    $longformPartial = 'services.partials.locking-nut-removal';
    if ($isEmergency) {
        $heroTitle = 'Emergency Tyre Call Out in Crawley: Fast Help at Your Roadside, Day or Night';
        $longformPartial = 'services.partials.emergency-callout';
    } elseif ($isPuncture) {
        $heroTitle = 'Mobile Puncture Repair in Crawley: We Fix Your Tyre at Home, Work or Roadside';
        $longformPartial = 'services.partials.puncture-repairs';
    } elseif ($isLocking) {
        $heroTitle = 'Locking Wheel Nut Removal in Crawley: Lost Key, Stuck or Damaged Nut';
    } elseif ($isWheels) {
        $heroTitle = 'Spare Wheel Swap and Fitting in Crawley: We Change Your Wheel at Home or Roadside';
        $longformPartial = 'services.partials.wheel-swaps-spares';
    }
@endphp

<x-page-hero
    :title="$heroTitle"
    :heading-class="$isLongform ? 'font-display text-[1.65rem] font-bold leading-[1.15] tracking-tight text-white sm:text-3xl lg:text-4xl' : 'font-display text-3xl font-bold tracking-tight text-white sm:text-4xl lg:text-5xl'"
    :breadcrumb="[
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Services', 'url' => route('services')],
        ['label' => $service['title'], 'url' => \App\Helpers\ServicesCatalog::url($service)],
    ]"
>
    @if($isEmergency)
        <div class="flex flex-col">
            <div class="order-2 sm:order-1">
                <p class="text-[15px] font-normal leading-relaxed sm:text-base lg:text-lg">A burst tyre never picks a good moment. It happens on the way home, before an early shift or in a dark car park.</p>
                <p class="mt-3 text-[15px] font-normal leading-relaxed sm:text-base lg:text-lg">{{ config('company.short_name') }} runs an emergency tyre call out in Crawley, West Sussex. Our mobile tyre technician drives to you with a trolley jack and impact tools, so you do not have to limp to a garage. We replace flat, burst and damaged tyres, and we repair punctures when it is safe to do so. We answer the phone 24 hours a day, 7 days a week. You hear the full price before we set off.</p>
            </div>
            <a href="{{ $tel }}" class="btn-on-brand order-1 mb-5 w-full sm:order-2 sm:mb-0 sm:mt-6 sm:w-auto">
                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                Call {{ config('company.phone') }}
            </a>
        </div>
    @elseif($isPuncture)
        <div class="flex flex-col">
            <div class="order-2 sm:order-1">
                <p class="text-[15px] font-normal leading-relaxed sm:text-base lg:text-lg">A nail in the tread doesn't have to mean a trip to the garage. {{ config('company.short_name') }} offers mobile puncture repair in Crawley, West Sussex. Our technician comes to your home, workplace or a safe roadside spot, checks the tyre and repairs it on the spot when it is safe to do so. If it can't be repaired, we tell you why and quote a replacement. Call <a href="{{ $tel }}" class="whitespace-nowrap font-semibold text-white underline decoration-white/40 underline-offset-2">{{ config('company.phone') }}</a>.</p>
            </div>
            <a href="{{ $tel }}" class="btn-on-brand order-1 mb-5 w-full sm:order-2 sm:mb-0 sm:mt-6 sm:w-auto">
                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                Call {{ config('company.phone') }}
            </a>
        </div>
    @elseif($isWheels)
        <div class="flex flex-col">
            <div class="order-2 sm:order-1">
                <p class="text-[15px] font-normal leading-relaxed sm:text-base lg:text-lg">Flat tyre and a spare in the boot, but no wish to kneel on the kerb? {{ config('company.short_name') }} offers spare wheel swap and fitting in Crawley, West Sussex. Our mobile tyre technician comes to your home, your workplace or a safe roadside spot. We take off the flat wheel, fit your spare and tighten every nut to the right torque. If your car has no spare, we help with that too. You hear the full price before we set off.</p>
            </div>
            <a href="{{ $tel }}" class="btn-on-brand order-1 mb-5 w-full sm:order-2 sm:mb-0 sm:mt-6 sm:w-auto">
                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                Call {{ config('company.phone') }}
            </a>
        </div>
    @elseif($isLocking)
        <div class="flex flex-col">
            <div class="order-2 sm:order-1">
                <p class="text-[15px] font-normal leading-relaxed sm:text-base lg:text-lg">Lost the key to your locking wheel nuts? {{ config('company.short_name') }} offers mobile locking wheel nut removal in Crawley, West Sussex. Our mobile tyre technician comes to your home, your workplace or a safe roadside spot. We remove the locking nut with specialist tools and aim to leave the wheel and the nut undamaged. You hear the full price before we set off.</p>
            </div>
            <a href="{{ $tel }}" class="btn-on-brand order-1 mb-5 w-full sm:order-2 sm:mb-0 sm:mt-6 sm:w-auto">
                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                Call {{ config('company.phone') }}
            </a>
        </div>
    @else
        {{ $service['short_description'] }}
    @endif
</x-page-hero>

@if($isLongform)
<section class="section-padding bg-ink-50">
    <div class="container-site">
        @include($longformPartial)
    </div>
</section>
@else
<section class="section-padding bg-ink-50">
    <div class="container-site">
        <div class="grid gap-12 lg:grid-cols-3">
            <div class="space-y-12 lg:col-span-2">
                <div>
                    <h2 class="font-display text-2xl font-bold tracking-tight text-ink-950">What we deliver</h2>
                    <ul class="mt-6 grid gap-3 sm:grid-cols-2">
                        @foreach($service['features'] as $feature)
                        <li class="flex items-start gap-3 rounded-lg border border-ink-200 bg-white p-4">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span class="text-sm text-ink-700">{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h2 class="font-display text-2xl font-bold tracking-tight text-ink-950">Key benefits</h2>
                    <ul class="mt-6 space-y-3">
                        @foreach($service['benefits'] as $benefit)
                        <li class="flex items-start gap-3">
                            <span class="mt-2 h-2 w-2 shrink-0 bg-brand-500"></span>
                            <span class="text-ink-600">{{ $benefit }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h2 class="font-display text-2xl font-bold tracking-tight text-ink-950">Our process</h2>
                    <div class="mt-6 space-y-4">
                        @foreach($service['process'] as $index => $step)
                        <div class="flex gap-4 rounded-lg border border-ink-200 bg-white p-5">
                            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-md bg-brand-500 text-sm font-bold text-white">{{ $index + 1 }}</span>
                            <div>
                                <h3 class="font-semibold text-ink-950">{{ $step['step'] }}</h3>
                                <p class="mt-1 text-sm text-ink-500">{{ $step['description'] }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                @if(!empty($service['faq']))
                <div x-data="faq()">
                    <h2 class="font-display text-2xl font-bold tracking-tight text-ink-950">FAQ</h2>
                    <div class="mt-6 divide-y divide-ink-200 rounded-lg border border-ink-200 bg-white">
                        @foreach($service['faq'] as $index => $faq)
                        <div class="px-5">
                            <button type="button" class="flex w-full items-center justify-between py-4 text-left" @click="toggle({{ $index }})">
                                <span class="pr-4 font-medium text-ink-950">{{ $faq['question'] }}</span>
                                <svg class="h-5 w-5 shrink-0 text-brand-600 transition" :class="active === {{ $index }} && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </button>
                            <div x-show="active === {{ $index }}" x-transition class="pb-4 text-sm text-ink-600" style="display: none;">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <div class="space-y-6">
                <div class="card sticky top-24">
                    <h3 class="font-display font-semibold tracking-wide text-ink-950">Need this service?</h3>
                    <p class="mt-3 text-sm text-ink-500">Call now for 24/7 mobile attendance. Clear pricing before we set off.</p>
                    <a href="{{ $tel }}" class="btn-call mt-6 w-full text-center">Call {{ config('company.phone') }}</a>
                    <a href="{{ route('contact') }}" class="btn-secondary mt-3 w-full text-center">Send a message</a>
                    <a href="{{ route('services') }}" class="btn-ghost mt-2 w-full text-center">All services</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<section class="section-padding mesh-dark">
    <div class="container-site text-center">
        @if($isEmergency)
        <h2 class="font-display text-2xl font-bold tracking-tight text-white text-balance sm:text-3xl">Need an emergency tyre call out in Crawley right now?</h2>
        <p class="mx-auto mt-4 max-w-2xl text-brand-50/90">Call {{ config('company.phone') }}. We answer 24 hours a day, 7 days a week. Tell us where you are, what car you drive and what has happened. We give you an arrival time and confirm the price before we travel, and we get you back on the road.</p>
        <a href="{{ $tel }}" class="btn-on-brand mt-6 w-full sm:w-auto">
            <i class="fa-solid fa-phone" aria-hidden="true"></i>
            Call {{ config('company.phone') }}
        </a>
        <div class="mt-4 flex flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center">
            <a href="{{ route('home') }}" class="btn-secondary-invert w-full sm:w-auto">AK Quick Mobile Tyres</a>
            <a href="{{ route('contact') }}" class="btn-secondary-invert w-full sm:w-auto">Contact us</a>
        </div>
        @elseif($isPuncture)
        <h2 class="font-display text-2xl font-bold tracking-tight text-white text-balance sm:text-3xl">Book Mobile Puncture Repair in Crawley</h2>
        <p class="mx-auto mt-4 max-w-2xl text-brand-50/90">Call {{ config('company.phone') }}, 24 hours a day, 7 days a week. Tell us where you are, what you drive and what has happened. We give you an arrival time and confirm the price before we travel. {{ config('company.short_name') }}: the workshop that comes to you.</p>
        <a href="{{ $tel }}" class="btn-on-brand mt-6 w-full sm:w-auto">
            <i class="fa-solid fa-phone" aria-hidden="true"></i>
            Call {{ config('company.phone') }}
        </a>
        <div class="mt-4 flex flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center">
            <a href="{{ route('home') }}" class="btn-secondary-invert w-full sm:w-auto">AK Quick Mobile Tyres</a>
            <a href="{{ route('contact') }}" class="btn-secondary-invert w-full sm:w-auto">Contact us</a>
        </div>
        @elseif($isWheels)
        <h2 class="font-display text-2xl font-bold tracking-tight text-white text-balance sm:text-3xl">Book spare wheel swap and fitting in Crawley</h2>
        <p class="mx-auto mt-4 max-w-2xl text-brand-50/90">Call {{ config('company.phone') }}. We answer 24 hours a day, 7 days a week. Tell us your car, where you are and what has happened to the tyre. We give you a price and an arrival time before we travel.</p>
        <a href="{{ $tel }}" class="btn-on-brand mt-6 w-full sm:w-auto">
            <i class="fa-solid fa-phone" aria-hidden="true"></i>
            Call {{ config('company.phone') }}
        </a>
        <div class="mt-4 flex flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center">
            <a href="{{ route('home') }}" class="btn-secondary-invert w-full sm:w-auto">AK Quick Mobile Tyres</a>
            <a href="{{ route('contact') }}" class="btn-secondary-invert w-full sm:w-auto">Contact us</a>
        </div>
        @elseif($isLocking)
        <h2 class="font-display text-2xl font-bold tracking-tight text-white text-balance sm:text-3xl">Book locking wheel nut removal in Crawley</h2>
        <p class="mx-auto mt-4 max-w-2xl text-brand-50/90">Call {{ config('company.phone') }}. We answer 24 hours a day, 7 days a week. Tell us your car, where you are and what has gone wrong with the key. We give you a price and an arrival time before we travel.</p>
        <a href="{{ $tel }}" class="btn-on-brand mt-6 w-full sm:w-auto">
            <i class="fa-solid fa-phone" aria-hidden="true"></i>
            Call {{ config('company.phone') }}
        </a>
        <div class="mt-4 flex flex-col items-stretch justify-center gap-3 sm:flex-row sm:items-center">
            <a href="{{ route('home') }}" class="btn-secondary-invert w-full sm:w-auto">AK Quick Mobile Tyres</a>
            <a href="{{ route('contact') }}" class="btn-secondary-invert w-full sm:w-auto">Contact us</a>
        </div>
        @else
        <h2 class="font-display text-2xl font-bold tracking-tight text-white sm:text-3xl">Ready for {{ $service['title'] }}?</h2>
        <p class="mx-auto mt-4 max-w-lg text-brand-50/90">Tell us where you are and what you need. We come to you.</p>
        <a href="{{ $tel }}" class="btn-on-brand mt-6">
            <i class="fa-solid fa-phone" aria-hidden="true"></i>
            Call {{ config('company.phone') }}
        </a>
        @endif
    </div>
</section>
@endsection
