@props([
    'id' => 'quote',
    'compact' => false,
])

@php
    $fieldClass = 'input-field mt-1.5';
<<<<<<< HEAD
    $captchaToken = old('form_token');

    if (! is_string($captchaToken) || ! \App\Helpers\QuoteFormGuard::exists($captchaToken)) {
        $captchaToken = \App\Helpers\QuoteFormGuard::issue();
    }
=======
    $captcha = \App\Helpers\QuoteFormGuard::issue();
>>>>>>> 8de614c607ad1e9cf47b6ecd42cff4f12323859f
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

<<<<<<< HEAD
            <form action="{{ route('contact.add') }}" method="POST" class="mt-8 space-y-5" style="position:relative;">
                @csrf
                <input type="hidden" name="form_token" value="{{ $captchaToken }}" data-captcha-token autocomplete="off">

                <div aria-hidden="true" style="position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0;">
                    <label for="{{ $id }}_extra_field">Leave blank</label>
=======
            <form action="{{ route('contact.add') }}" method="POST" class="mt-8 space-y-5" style="position:relative;" novalidate>
                @csrf
                <input type="hidden" name="form_token" value="{{ $captcha['token'] }}">

                <div aria-hidden="true" style="position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0;">
                    <label for="{{ $id }}_extra_field">Website</label>
>>>>>>> 8de614c607ad1e9cf47b6ecd42cff4f12323859f
                    <input type="text" name="extra_field" id="{{ $id }}_extra_field" tabindex="-1" autocomplete="off" value="">
                </div>

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

                <div style="display: none;" class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="{{ $id }}_email" class="block text-sm font-semibold text-ink-800">Email <span class="text-brand-500">*</span></label>
                        <input type="email" name="email" id="{{ $id }}_email" value="{{ old('email') }}" maxlength="255"
                               class="{{ $fieldClass }} @error('email') border-red-400 focus:border-red-400 focus:ring-red-400 @enderror"
                               placeholder="you@example.com" autocomplete="email">
                        @error('email')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="{{ $id }}_title" class="block text-sm font-semibold text-ink-800">Subject <span class="text-brand-500">*</span></label>
                        <input type="text" name="title" id="{{ $id }}_title" value="{{ old('title') }}" maxlength="255"
                               class="{{ $fieldClass }} @error('title') border-red-400 focus:border-red-400 focus:ring-red-400 @enderror"
                               placeholder="e.g. Puncture repair, new tyre">
                        @error('title')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div style="display: none;" >
                    <label for="{{ $id }}_message" class="block text-sm font-semibold text-ink-800">Message <span class="text-brand-500">*</span></label>
                    <textarea name="message" id="{{ $id }}_message" rows="5" maxlength="2000"
                              class="{{ $fieldClass }} @error('message') border-red-400 focus:border-red-400 focus:ring-red-400 @enderror"
                              placeholder="Location, vehicle type, tyre size if known, and what you need…">{{ old('message') }}</textarea>
                    @error('message')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="{{ $id }}_captcha" class="block text-sm font-semibold text-ink-800">Security code <span class="text-brand-500">*</span></label>
                    <div class="mt-1.5" style="display:flex;flex-wrap:wrap;align-items:center;gap:0.75rem;">
                        <img src="{{ route('contact.captcha', ['token' => $captchaToken]) }}" alt="Security code" width="180" height="56"
                             data-captcha-image
                             style="height:56px;width:180px;border-radius:0.5rem;border:1px solid #c9d5e3;background:#f3f6f9;">
                        <input type="text" name="captcha" id="{{ $id }}_captcha" value="{{ old('captcha') }}" inputmode="text" autocomplete="off" autocapitalize="characters" spellcheck="false" required maxlength="8"
                               data-captcha-input
                               class="input-field @error('captcha') border-red-400 focus:border-red-400 focus:ring-red-400 @enderror"
                               style="margin-top:0;max-width:9rem;" placeholder="Enter code">
                    </div>
                    <p class="mt-1.5 text-xs text-ink-400">
                        Type the characters from the image. Capitals do not matter.
                        <button type="button" class="font-semibold text-brand-500 hover:underline" data-captcha-refresh>Get a new code</button>
                    </p>
                    @error('captcha')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    @error('form_token')
                    <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="{{ $id }}_captcha" class="block text-sm font-semibold text-ink-800">Security code <span class="text-brand-500">*</span></label>
                    @if($captcha['mode'] === 'image')
                    <div class="mt-1.5" style="display:flex;flex-wrap:wrap;align-items:center;gap:0.75rem;">
                        <img src="{{ route('contact.captcha', ['token' => $captcha['token']]) }}" alt="Security code" width="180" height="56"
                             style="height:56px;width:180px;border-radius:0.5rem;border:1px solid #c9d5e3;background:#f3f6f9;">
                        <input type="text" name="captcha" id="{{ $id }}_captcha" inputmode="text" autocomplete="off" autocapitalize="characters" spellcheck="false" required maxlength="8"
                               class="input-field" style="margin-top:0;max-width:9rem;" placeholder="Enter code">
                    </div>
                    <p class="mt-1.5 text-xs text-ink-400">
                        Type the characters from the image.
                        <a href="{{ request()->fullUrlWithQuery(['code' => time()]) }}#{{ $id }}" class="font-semibold text-brand-500 hover:underline">Get a new code</a>
                    </p>
                    @else
                    <p class="mt-1 text-sm text-ink-500">What is {{ $captcha['question'] }}?</p>
                    <input type="text" name="captcha" id="{{ $id }}_captcha" inputmode="numeric" autocomplete="off" required maxlength="8"
                           class="{{ $fieldClass }}" style="max-width:9rem;" placeholder="Answer">
                    @endif
                    @error('captcha')
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
            <script>
                (function () {
                    var root = document.getElementById(@json($id));
                    if (!root) return;

                    var button = root.querySelector('[data-captcha-refresh]');
                    var image = root.querySelector('[data-captcha-image]');
                    var token = root.querySelector('[data-captcha-token]');
                    var input = root.querySelector('[data-captcha-input]');
                    var csrf = document.querySelector('meta[name="csrf-token"]');

                    if (!button || !image || !token || !csrf) return;

                    button.addEventListener('click', function () {
                        button.disabled = true;

                        fetch(@json(route('contact.captcha.refresh')), {
                            method: 'POST',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': csrf.getAttribute('content'),
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        }).then(function (response) {
                            if (!response.ok) {
                                throw new Error('Could not refresh the security code.');
                            }
                            return response.json();
                        }).then(function (data) {
                            token.value = data.token;
                            image.src = data.image;
                            if (input) {
                                input.value = '';
                                input.focus();
                            }
                        }).catch(function () {
                            window.location.reload();
                        }).finally(function () {
                            button.disabled = false;
                        });
                    });
                })();
            </script>
        </div>
    </div>
</section>
