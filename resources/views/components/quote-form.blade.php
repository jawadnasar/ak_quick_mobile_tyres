@props([
    'id' => 'quote',
    'compact' => false,
])

@php
    $fieldClass = 'input-field mt-1.5';
@endphp

<section id="{{ $id }}" @class(['scroll-mt-24', $compact ? '' : 'section-padding bg-ink-50'])>
    <div @class([$compact ? '' : 'container-site'])>
        <div @class(['quote-panel', 'mx-auto max-w-3xl' => ! $compact])>
            <div class="border-l-4 border-brand-500 pl-4">
                <p class="section-label !mt-0">Request a quote</p>
                <h2 class="mt-2 font-display text-2xl font-bold tracking-tight text-ink-950 sm:text-3xl">
                    Tell us what you need
                </h2>
                <p class="mt-2 text-sm text-ink-500 sm:text-base">
                    Send your details and we will get back with options and pricing. For emergencies, call us now.
                </p>
            </div>

            @if(session('quote_success'))
            <div class="mt-6 rounded-lg border border-brand-200 bg-brand-50 px-4 py-3 text-sm font-medium text-brand-800" role="status">
                {{ session('quote_success') }}
            </div>
            @endif

            @if(session('quote_error'))
            <div class="mt-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800" role="alert">
                {{ session('quote_error') }}
            </div>
            @endif

            <form action="{{ route('contact.add') }}" method="POST" class="mt-8 space-y-5" novalidate>
                @csrf

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="{{ $id }}_name" class="block text-sm font-semibold text-ink-800">Name <span class="text-brand-500">*</span></label>
                        <input type="text" name="name" id="{{ $id }}_name" value="{{ old('name') }}" required maxlength="255"
                               class="{{ $fieldClass }} @error('name') border-red-400 focus:border-red-400 focus:ring-red-400 @enderror"
                               placeholder="Your full name" autocomplete="name">
                        @error('name')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="{{ $id }}_phone" class="block text-sm font-semibold text-ink-800">Phone <span class="text-brand-500">*</span></label>
                        <input type="tel" name="phone" id="{{ $id }}_phone" value="{{ old('phone') }}" required maxlength="40"
                               class="{{ $fieldClass }} @error('phone') border-red-400 focus:border-red-400 focus:ring-red-400 @enderror"
                               placeholder="Best number to reach you" autocomplete="tel">
                        @error('phone')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="{{ $id }}_email" class="block text-sm font-semibold text-ink-800">Email <span class="text-brand-500">*</span></label>
                        <input type="email" name="email" id="{{ $id }}_email" value="{{ old('email') }}" required maxlength="255"
                               class="{{ $fieldClass }} @error('email') border-red-400 focus:border-red-400 focus:ring-red-400 @enderror"
                               placeholder="you@example.com" autocomplete="email">
                        @error('email')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="{{ $id }}_title" class="block text-sm font-semibold text-ink-800">Subject <span class="text-brand-500">*</span></label>
                        <input type="text" name="title" id="{{ $id }}_title" value="{{ old('title') }}" required maxlength="255"
                               class="{{ $fieldClass }} @error('title') border-red-400 focus:border-red-400 focus:ring-red-400 @enderror"
                               placeholder="e.g. Puncture repair, new tyre">
                        @error('title')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="{{ $id }}_message" class="block text-sm font-semibold text-ink-800">Message <span class="text-brand-500">*</span></label>
                    <textarea name="message" id="{{ $id }}_message" rows="5" required maxlength="2000"
                              class="{{ $fieldClass }} @error('message') border-red-400 focus:border-red-400 focus:ring-red-400 @enderror"
                              placeholder="Location, vehicle type, tyre size if known, and what you need…">{{ old('message') }}</textarea>
                    @error('message')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-xs text-ink-400">
                        We reply by phone or email. For urgent help, call
                        <a href="tel:+{{ config('company.phone_link') }}" class="font-semibold text-brand-500 hover:underline">{{ config('company.phone') }}</a>.
                    </p>
                    <button type="submit" class="btn-primary shrink-0 px-8">
                        Send quote request
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
