@php
    $company = config('company');
    $currentRoute = request()->route()?->getName();
    $tel = 'tel:+' . $company['phone_link'];

    $navLinkClass = fn (bool $active) => 'rounded-md px-3 py-2 text-sm font-semibold tracking-wide transition '
        . ($active ? 'bg-white/15 text-white' : 'text-white/85 hover:bg-white/10 hover:text-white');
@endphp

<div x-data="{ ...mobileNav(), ...scrollHeader() }">
    <header :class="scrolled ? 'bg-brand-600 shadow-soft' : 'bg-brand-500'"
            class="fixed inset-x-0 top-0 z-50 border-b border-brand-600/40 transition-all duration-300">
        <div class="container-site">
            <div class="relative flex h-16 items-center lg:h-20">
                <a href="{{ route('home') }}" class="relative z-10 flex shrink-0 items-center gap-3" aria-label="{{ $company['name'] }}">
                    <img src="{{ asset('front-theme/assets/img/logo.png') }}"
                         alt="{{ $company['name'] }} logo"
                         class="h-10 w-auto lg:h-12"
                         width="140"
                         height="56"
                         fetchpriority="high"
                         decoding="async">
                    <span class="hidden max-w-[11rem] font-display text-[0.7rem] font-bold uppercase leading-tight tracking-wide text-white sm:block lg:max-w-[13rem] lg:text-xs">
                        {{ $company['name'] }}
                    </span>
                </a>

                <nav class="absolute left-1/2 hidden -translate-x-1/2 items-center gap-1 lg:flex" aria-label="Main navigation">
                    <a href="{{ route('home') }}" class="{{ $navLinkClass($currentRoute === 'home') }}">Home</a>
                    <a href="{{ route('services') }}" class="{{ $navLinkClass(str_starts_with($currentRoute ?? '', 'services')) }}">Services</a>
                    <a href="{{ route('about-us') }}" class="{{ $navLinkClass($currentRoute === 'about-us') }}">About Us</a>
                    <a href="{{ route('contact') }}" class="{{ $navLinkClass($currentRoute === 'contact') }}">Contact</a>
                </nav>

                <div class="relative z-10 ml-auto flex items-center gap-2 sm:gap-3">
                    <a href="{{ route('quote') }}"
                       class="btn-secondary-invert hidden px-4 py-2.5 text-sm lg:inline-flex {{ $currentRoute === 'quote' ? '!border-white !bg-white/15' : '' }}">
                        Request a Quote
                    </a>
                    <a href="{{ $tel }}" class="btn-on-brand hidden text-sm lg:inline-flex">
                        <i class="fa-solid fa-phone" aria-hidden="true"></i>
                        Call {{ $company['phone'] }}
                    </a>
                    <a href="{{ route('quote') }}"
                       class="btn-secondary-invert inline-flex px-3 py-2.5 text-xs sm:text-sm lg:hidden"
                       aria-label="Request a quote">
                        Quote
                    </a>
                    <a href="{{ $tel }}"
                       class="btn-on-brand inline-flex px-3.5 py-2.5 text-xs sm:text-sm lg:hidden"
                       aria-label="Call {{ $company['phone'] }} now">
                        <i class="fa-solid fa-phone" aria-hidden="true"></i>
                        Call
                    </a>
                    <button type="button"
                            class="inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-white/10 lg:hidden"
                            @click="toggle()"
                            aria-label="Open menu">
                        <i x-show="!open" class="fa-solid fa-bars text-lg"></i>
                        <i x-show="open" class="fa-solid fa-xmark text-lg" style="display:none"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 lg:hidden"
         style="display: none;">
        <div class="absolute inset-0 bg-brand-900/60" @click="close()"></div>
        <nav class="absolute right-0 top-0 h-full w-full max-w-sm border-l border-brand-400/30 bg-brand-500 p-6 shadow-xl"
             x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             aria-label="Mobile navigation">
            <div class="flex items-center justify-between">
                <img src="{{ asset('front-theme/assets/img/logo.png') }}" alt="{{ $company['name'] }}" class="h-9">
                <button type="button" @click="close()" class="rounded-md p-2 text-white hover:bg-white/10" aria-label="Close menu">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <div class="mt-8 flex flex-col gap-1">
                <a href="{{ route('home') }}" @click="close()" class="rounded-md px-4 py-3 text-base font-semibold text-white hover:bg-white/10">Home</a>
                <a href="{{ route('services') }}" @click="close()" class="rounded-md px-4 py-3 text-base font-semibold text-white hover:bg-white/10">Services</a>
                <a href="{{ route('about-us') }}" @click="close()" class="rounded-md px-4 py-3 text-base font-semibold text-white hover:bg-white/10">About Us</a>
                <a href="{{ route('contact') }}" @click="close()" class="rounded-md px-4 py-3 text-base font-semibold text-white hover:bg-white/10">Contact</a>
                <a href="{{ route('quote') }}" @click="close()" class="btn-secondary-invert mt-4 text-center">Request a Quote</a>
                <a href="{{ $tel }}" @click="close()" class="btn-on-brand mt-2 text-center">
                    Call {{ $company['phone'] }}
                </a>
                <p class="mt-3 text-center text-xs uppercase tracking-wider text-brand-100">{{ $company['availability'] }}</p>
            </div>
        </nav>
    </div>

    <div class="h-16 lg:h-20" aria-hidden="true"></div>
</div>
