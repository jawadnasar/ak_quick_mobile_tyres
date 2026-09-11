@php
    $company = config('company');
    $services = collect(config('services_catalog'))->take(6);
    $tel = 'tel:+' . $company['phone_link'];
    $social = array_filter($company['social'] ?? []);
@endphp

<footer class="bg-brand-footer">
    <div class="container-site section-padding !pb-10">
        <div class="grid gap-12 lg:grid-cols-12">
            <div class="lg:col-span-4">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <img src="{{ asset('front-theme/assets/img/logo-transparent.png') }}"
                         alt="{{ $company['name'] }}"
                         class="h-12 w-auto lg:h-14"
                         loading="lazy"
                         decoding="async"
                         width="140"
                         height="56">
                </a>
                <p class="mt-4 max-w-sm text-sm leading-relaxed text-brand-100/90">
                    Emergency mobile tyre fitting and puncture repair. We come to you 24/7 at the roadside, at home or at work.
                </p>
                <a href="{{ $tel }}" class="btn-on-brand mt-6 text-sm">
                    <i class="fa-solid fa-phone" aria-hidden="true"></i>
                    Call {{ $company['phone'] }}
                </a>
                <div class="mt-6 space-y-2 text-sm text-brand-50">
                    <p class="flex items-center gap-2">
                        <i class="fa-solid fa-clock w-4 text-brand-200" aria-hidden="true"></i>
                        {{ $company['availability'] }}
                    </p>
                    <p class="flex items-start gap-2">
                        <i class="fa-solid fa-location-dot mt-0.5 w-4 text-brand-200" aria-hidden="true"></i>
                        {{ $company['address'] }}
                    </p>
                    @if(!empty($company['email']))
                    <p class="flex items-center gap-2">
                        <i class="fa-solid fa-envelope w-4 text-brand-200" aria-hidden="true"></i>
                        <a href="mailto:{{ $company['email'] }}" class="hover:text-white">{{ $company['email'] }}</a>
                    </p>
                    @endif
                    <p class="flex items-center gap-2">
                        <i class="fa-solid fa-phone w-4 text-brand-200" aria-hidden="true"></i>
                        <a href="{{ $tel }}" class="hover:text-white">{{ $company['phone'] }}</a>
                    </p>
                </div>
            </div>

            <div class="lg:col-span-2">
                <h3 class="font-display text-sm font-semibold uppercase tracking-wider text-white">Quick Links</h3>
                <ul class="mt-4 space-y-3 text-sm text-brand-100">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ route('about-us') }}" class="hover:text-white">About Us</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-white">Services</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
                    <li><a href="{{ route('quote') }}" class="hover:text-white">Request a Quote</a></li>
                </ul>
            </div>

            <div class="lg:col-span-3">
                <h3 class="font-display text-sm font-semibold uppercase tracking-wider text-white">Services</h3>
                <ul class="mt-4 space-y-3 text-sm text-brand-100">
                    @foreach($services as $service)
                    <li>
                        <a href="{{ route('services.show', $service['slug']) }}" class="hover:text-white">
                            {{ $service['title'] }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="lg:col-span-3">
                <h3 class="font-display text-sm font-semibold uppercase tracking-wider text-white">Need Help Now?</h3>
                <p class="mt-4 text-sm text-brand-100">Tyre trouble? Call our mobile team. We are ready around the clock.</p>
                <a href="{{ $tel }}" class="btn-secondary-invert mt-5 text-sm">Call Now</a>
                @if($social)
                <div class="mt-6 flex gap-3">
                    @foreach($social as $platform => $url)
                    <a href="{{ $url }}" target="_blank" rel="noopener noreferrer"
                       class="flex h-10 w-10 items-center justify-center rounded-md border border-white/20 bg-white/10 text-brand-50 transition hover:bg-white/20 hover:text-white"
                       aria-label="{{ ucfirst($platform) }}">
                        <span class="text-xs font-semibold uppercase">{{ substr($platform, 0, 2) }}</span>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>

        <div class="mt-12 flex flex-col items-center justify-between gap-4 border-t border-white/15 pt-8 sm:flex-row">
            <p class="text-sm text-brand-200">
                &copy; {{ date('Y') }} {{ $company['name'] }}. All rights reserved.
            </p>
            <div class="flex flex-wrap justify-center gap-6 text-sm">
                <a href="{{ route('privacy-policy') }}" class="text-brand-200 hover:text-white">Privacy Policy</a>
                <a href="{{ route('terms') }}" class="text-brand-200 hover:text-white">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
