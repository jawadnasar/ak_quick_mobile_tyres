@extends('layouts.app')

@php
    $tel = 'tel:+' . config('company.phone_link');
@endphp

@section('content')
<x-page-hero :title="$service['title']" :breadcrumb="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Services', 'url' => route('services')],
    ['label' => $service['title'], 'url' => route('services.show', $service['slug'])],
]">
    {{ $service['short_description'] }}
</x-page-hero>

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

<section class="section-padding mesh-dark">
    <div class="container-site text-center">
        <h2 class="font-display text-2xl font-bold tracking-tight text-white sm:text-3xl">Ready for {{ $service['title'] }}?</h2>
        <p class="mx-auto mt-4 max-w-lg text-brand-50/90">Tell us where you are and what you need. We come to you.</p>
        <a href="{{ $tel }}" class="btn-on-brand mt-6">
            <i class="fa-solid fa-phone" aria-hidden="true"></i>
            Call {{ config('company.phone') }}
        </a>
    </div>
</section>
@endsection
