<div class="space-y-4 sm:space-y-5">
    <div class="guide-card flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <div class="min-w-0">
            <p class="font-display text-lg font-bold tracking-tight text-ink-950 sm:text-xl">Need this service?</p>
            <p class="mt-1 text-sm leading-relaxed text-ink-600 sm:text-base">Call now for 24/7 mobile attendance. Clear pricing before we set off.</p>
        </div>
        <div class="flex w-full flex-col gap-2 sm:flex-row sm:flex-wrap lg:w-auto lg:justify-end">
            <a href="{{ $tel }}" class="btn-call w-full justify-center sm:w-auto">Call {{ config('company.phone') }}</a>
            <a href="{{ route('contact') }}" class="btn-secondary w-full justify-center sm:w-auto">Send a message</a>
            <a href="{{ route('services') }}" class="btn-ghost w-full justify-center sm:w-auto">All services</a>
        </div>
    </div>

    <article class="guide-card">
        <h2>Mobile Tyre Repair at Home, Work or Roadside</h2>
        <p class="guide-copy">Our van carries a trolley jack and impact tools, so the wheel comes off right where your car is parked.</p>
        <div class="mt-5 grid items-stretch gap-3 md:grid-cols-3">
            <div class="flex h-full flex-col rounded-xl border border-brand-200 bg-ink-50 p-4">
                <h3 class="mt-0 font-display text-base font-bold leading-snug text-ink-950">At home</h3>
                <p class="mt-2 text-sm leading-relaxed text-ink-600">All we need is a flat, safe spot on your drive or in front of your house.</p>
            </div>
            <div class="flex h-full flex-col rounded-xl border border-brand-200 bg-ink-50 p-4">
                <h3 class="mt-0 font-display text-base font-bold leading-snug text-ink-950">At work</h3>
                <p class="mt-2 text-sm leading-relaxed text-ink-600">We come to workplace car parks, including Manor Royal. For several vehicles, tell us how many and where they are.</p>
            </div>
            <div class="flex h-full flex-col rounded-xl border border-brand-200 bg-ink-50 p-4">
                <h3 class="mt-0 font-display text-base font-bold leading-snug text-ink-950">Roadside</h3>
                <p class="mt-2 text-sm leading-relaxed text-ink-600">Pull into a lay-by, quiet road or car park, switch on your hazard lights and call us. Never kneel beside live traffic. For night calls, see our <a href="{{ route('services.emergency') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">emergency tyre call out</a> page.</p>
            </div>
        </div>
    </article>

    <article class="guide-card">
        <h2>What Can and Cannot Be Repaired (BS AU 159)</h2>
        <p class="guide-copy">Only a trained technician can judge a repair, after a proper inspection.</p>
        <div class="mt-5 grid gap-2">
            @foreach([
                ['Nail or screw in the central three quarters of the tread, hole 6 mm or less', 'Usually yes'],
                ['Hole larger than 6 mm', 'No'],
                ['Sidewall puncture or damage outside the central three quarters', 'No'],
                ['Split, cut, gouge, bulge or exposed cords', 'No'],
                ['Tread below 1.6 mm', 'No'],
                ['Tyre driven flat', 'Usually no'],
                ['Run flat tyre', 'Usually no'],
                ['Tyre with sealant inside', 'Yes, after inspection'],
            ] as $row)
            <div class="flex flex-col gap-2 rounded-xl border border-brand-200 bg-ink-50 px-4 py-3 sm:flex-row sm:items-center sm:justify-between sm:gap-6">
                <p class="min-w-0 text-[15px] leading-snug text-ink-700 sm:text-base">{{ $row[0] }}</p>
                <span class="inline-flex w-fit shrink-0 rounded-full border border-brand-300 bg-white px-3 py-1.5 font-display text-xs font-bold leading-none text-ink-950 sm:text-sm">{{ $row[1] }}</span>
            </div>
            @endforeach
        </div>
    </article>

    <article class="guide-card">
        <h2>How We Repair a Puncture</h2>
        <p class="guide-copy">A proper repair is more than a plug pushed in from outside. An outside-only repair can't show damage inside the tyre.</p>
        <ol class="guide-steps sm:grid-cols-2">
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We find the hole.</strong> A nail or screw stays in until the wheel is off.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We remove the wheel</strong> and take the tyre off the rim.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We inspect</strong> the inner liner and inside of the tyre.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We fit a plug and patch:</strong> the patch seals the inside, the mushroom plug fills the hole.</span></li>
            <li class="sm:col-span-2"><span class="min-w-0"><strong class="font-display text-ink-950">We refit the tyre,</strong> check the valve and set the pressure to your handbook figure.</span></li>
        </ol>
    </article>

    <article class="guide-card">
        <div class="lg:grid lg:grid-cols-12 lg:items-start lg:gap-10">
            <div class="lg:col-span-4">
                <h2>Flat Tyre? Do This First</h2>
            </div>
            <ol class="guide-steps sm:grid-cols-2 lg:col-span-8 lg:mt-0">
                <li><span class="min-w-0"><strong class="font-display text-ink-950">Switch on your hazard lights</strong> and pull over somewhere safe.</span></li>
                <li><span class="min-w-0"><strong class="font-display text-ink-950">Don't keep driving.</strong> It can wreck the tyre and the wheel rim.</span></li>
                <li><span class="min-w-0"><strong class="font-display text-ink-950">Stay away from traffic</strong> and call <a href="{{ $tel }}">{{ config('company.phone') }}</a>.</span></li>
                <li><span class="min-w-0"><strong class="font-display text-ink-950">Give us your location,</strong> registration number and tyre size.</span></li>
            </ol>
        </div>
    </article>

    <article class="guide-card">
        <h2>Run Flats, Sealant and Self-Sealing Tyres</h2>
        <div class="mt-5 grid items-stretch gap-3 md:grid-cols-3">
            <div class="flex h-full flex-col rounded-xl border border-brand-200 bg-ink-50 p-4">
                <h3 class="mt-0 font-display text-base font-bold leading-snug text-ink-950">Run flat tyres</h3>
                <p class="mt-2 text-sm leading-relaxed text-ink-600">Most are replaced, because the stiff sidewalls can hide damage. If the TPMS light comes on, stop somewhere safe and call us.</p>
            </div>
            <div class="flex h-full flex-col rounded-xl border border-brand-200 bg-ink-50 p-4">
                <h3 class="mt-0 font-display text-base font-bold leading-snug text-ink-950">Emergency sealant or foam</h3>
                <p class="mt-2 text-sm leading-relaxed text-ink-600">This is a temporary fix to get you to a garage, so keep trips short and under 50 mph. A tyre with sealant can still be repaired after a professional inspection. Tell us which product you used.</p>
            </div>
            <div class="flex h-full flex-col rounded-xl border border-brand-200 bg-ink-50 p-4">
                <h3 class="mt-0 font-display text-base font-bold leading-snug text-ink-950">Self-sealing tyres (e.g. ContiSeal)</h3>
                <p class="mt-2 text-sm leading-relaxed text-ink-600">They seal small holes but aren't a permanent repair, so get the tyre checked.</p>
            </div>
        </div>
    </article>

    <article class="guide-card">
        <h2>Puncture Repair Cost</h2>
        <div class="mt-4 grid gap-4 lg:grid-cols-[minmax(0,16rem)_1fr] lg:items-start">
            <div class="rounded-xl bg-brand-500 p-4 text-white">
                <p class="font-display text-3xl font-bold leading-none">£23.42</p>
                <p class="mt-2 text-sm leading-snug text-brand-100">Average UK garage puncture repair (FixMyCar, August 2025).</p>
            </div>
            <div>
                <p class="text-[15px] leading-relaxed text-ink-600 sm:text-base">Mobile repair usually costs a little more because we come to you. At {{ config('company.short_name') }} we quote the full price, including any call out charge, before we set off. It depends on the tyre size, vehicle, damage, location and time of day. When a tyre is repairable, repair costs less than a new tyre.</p>
            </div>
        </div>
    </article>

    <article class="guide-card">
        <h2>Arrival and Repair Time</h2>
        <div class="mt-4 grid gap-2 sm:grid-cols-2">
            <div class="rounded-xl bg-brand-500 p-4 text-white">
                <p class="font-display text-3xl font-bold leading-none">30–60</p>
                <p class="mt-2 text-sm leading-snug text-brand-100">Minutes. Our usual arrival time, depending on traffic, distance and demand.</p>
            </div>
            <div class="rounded-xl border border-brand-200 bg-ink-50 p-4">
                <p class="font-display text-3xl font-bold leading-none text-ink-950">30–45</p>
                <p class="mt-2 text-sm leading-snug text-ink-600">Minutes. A typical repair once we are on site. For urgent jobs, call as early as you can.</p>
            </div>
        </div>
    </article>

    <article class="guide-card">
        <h2>When a Tyre Can't Be Repaired</h2>
        <p class="guide-copy">{{ config('company.short_name') }} shows you the damage and quotes a replacement matched to your car's size, load rating and speed rating. We fit budget, mid range and premium brands. We never attempt a repair that BS AU 159 doesn't allow.</p>
    </article>

    <article class="guide-card">
        <h2>Why Choose AK Quick Mobile Tyres</h2>
        <p class="guide-copy">{{ config('company.short_name') }} is a Crawley mobile tyre fitter that brings the workshop to your door. Here is what you get:</p>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li><strong class="font-display text-ink-950">We come to you:</strong> our van carries the jack and tools, so we repair or replace your tyre at home, at work or at the roadside.</li>
            <li><strong class="font-display text-ink-950">Open around the clock:</strong> we answer the phone 24 hours a day, 7 days a week, and usually arrive in 30 to 60 minutes.</li>
            <li><strong class="font-display text-ink-950">Price upfront:</strong> you hear the full price, including any call out charge, before we set off.</li>
            <li><strong class="font-display text-ink-950">Straight advice:</strong> we show you the damage and tell you plainly when a tyre cannot be repaired.</li>
            <li><strong class="font-display text-ink-950">Repairs done properly:</strong> every repair follows BS AU 159, with an inside inspection and a plug and patch.</li>
            <li><strong class="font-display text-ink-950">Every vehicle:</strong> cars, vans, 4x4s and electric cars, with replacement tyres in budget, mid range and premium brands.</li>
        </ul>
    </article>

    <article class="guide-card">
        <h2>Where We Work</h2>
        <p class="guide-copy">We cover RH10 and RH11, including Three Bridges, Pound Hill, Maidenbower, Tilgate, Southgate, Ifield, Broadfield and Bewbush. We also take calls from Horley, Pease Pottage, Handcross, Crawley Down, Copthorne, Horsham and East Grinstead. Give us your postcode to confirm availability. Gatwick Airport car parks have their own rules, so check with them first.</p>
        <p class="mt-5 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Postcodes</p>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach(['RH10', 'RH11'] as $place)
            <li class="place-chip">{{ $place }}</li>
            @endforeach
        </ul>
        <p class="mt-4 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Places</p>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach(['Three Bridges', 'Pound Hill', 'Maidenbower', 'Tilgate', 'Southgate', 'Ifield', 'Broadfield', 'Bewbush', 'Horley', 'Pease Pottage', 'Handcross', 'Crawley Down', 'Copthorne', 'Horsham', 'East Grinstead'] as $place)
            <li class="place-chip">{{ $place }}</li>
            @endforeach
        </ul>
    </article>

    <article class="guide-card">
        <h2>Have Ready When You Call</h2>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>Your location or postcode</li>
            <li>Registration number</li>
            <li>Tyre size (on the sidewall)</li>
            <li>A photo of the damage, if safe to take</li>
            <li>Your locking wheel nut key</li>
        </ul>
    </article>

    <article class="guide-card" id="puncture-faq">
        <h2>Frequently Asked Questions</h2>
        <div class="mt-4 divide-y divide-brand-100 overflow-hidden rounded-xl border border-brand-200" x-data="faq()">
            @foreach($service['faq'] as $index => $faq)
            <div class="bg-white px-4 sm:px-5">
                <button type="button" class="flex w-full items-center justify-between gap-3 py-4 text-left" @click="toggle({{ $index }})" :aria-expanded="active === {{ $index }}">
                    <h3 class="m-0 min-w-0 flex-1 text-left text-base font-semibold leading-snug text-ink-950">{{ $faq['question'] }}</h3>
                    <svg class="h-5 w-5 shrink-0 text-brand-600 transition" :class="active === {{ $index }} && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="active === {{ $index }}" x-transition class="pb-4 text-sm leading-relaxed text-ink-600" style="display: none;">
                    {{ $faq['answer'] }}
                </div>
            </div>
            @endforeach
        </div>
    </article>
</div>
