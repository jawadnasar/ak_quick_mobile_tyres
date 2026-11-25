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
        <h2>How we swap your flat wheel for the spare</h2>
        <p class="guide-copy">A wheel swap sounds simple, but a few steps matter. This is the order we follow:</p>
        <ol class="guide-steps sm:grid-cols-2">
            <li><span class="min-w-0"><strong class="font-display text-ink-950">You call <a href="{{ $tel }}">{{ config('company.phone') }}</a></strong> and tell us the car, the problem and where you are.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We give you a price</strong> and an arrival time.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">Our technician arrives,</strong> checks the spot is safe and puts the handbrake on.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We loosen the wheel nuts</strong> while the wheel is still on the ground.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We jack the car</strong> at the correct jacking point and take off the flat wheel.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We fit the spare</strong> and tighten the nuts in a diagonal pattern, to the torque in your handbook.</span></li>
            <li class="sm:col-span-2"><span class="min-w-0"><strong class="font-display text-ink-950">We lower the car,</strong> check the pressure in the spare and tell you what to do next.</span></li>
        </ol>
        <p class="guide-copy">Which says to loosen the nuts before you jack the car, and to tighten them in a diagonal pattern. On a five nut wheel that means 1, 3, 5, 2, 4. It also says to use the maker's torque setting, which you can find in the handbook. Our van carries a trolley jack and impact tools, so the job does not rely on the flimsy jack from the boot.</p>
    </article>

    <article class="guide-card">
        <h2>Check which spare your car has</h2>
        <p class="guide-copy">Not every car carries the same kind of spare. Check your boot floor, or ask us when you call.</p>
        <div class="mt-5 grid gap-2 sm:grid-cols-2">
            @foreach([
                ['Full size spare', 'A normal wheel and tyre', 'You can drive on it as normal, but fix the flat soon'],
                ['Space saver', 'A thin emergency wheel', 'Limited speed, so it only gets you to a repair'],
                ['Repair kit only', 'Foam sealant and a compressor, no wheel', 'There is no wheel to swap, so call us if the kit fails'],
                ['No spare, run flat tyres', 'Reinforced sidewalls instead of a spare', 'Limited distance and speed, so see a fitter soon'],
            ] as $row)
            <div class="rounded-xl border border-brand-200 bg-ink-50 p-4">
                <p class="font-display text-base font-bold leading-snug text-ink-950">{{ $row[0] }}</p>
                <p class="mt-2 text-sm leading-relaxed text-ink-700">{{ $row[1] }}</p>
                <p class="mt-1 text-sm leading-relaxed text-ink-600">{{ $row[2] }}</p>
            </div>
            @endforeach
        </div>
        <p class="guide-copy">Kwik Fit says many cars now come with a repair kit instead of a spare, because it saves space, weight and fuel. The RAC says roughly half of new cars do not come with a spare wheel. Space savers were close to standard from the 1970s to the late 2000s, says Kwik Fit.</p>
    </article>

    <article class="guide-card">
        <h2>Driving on a space saver wheel</h2>
        <p class="guide-copy">A space saver is for getting you to help, not for getting you home from a holiday. Here is what the sources say:</p>
        <ul class="guide-points">
            <li>Kwik Fit says the top speed is usually 50 mph. It is normally on a sticker on the wheel. If the sticker is missing, keep to 30 mph until you reach help.</li>
            <li>The RAC says a space saver is not suitable for long, extended journeys unless there is no other choice. Grip is lower, so the car may skid more easily in heavy braking.</li>
            <li>Kwik Fit gives about 60 PSI as the average pressure for a spare. Check the label, because it varies.</li>
            <li>The RAC says the spare should be the same size as the original, with no more than a 3% difference in overall radius.</li>
            <li>Which says never use sealant on a punctured space saver.</li>
        </ul>
        <p class="guide-copy">Our <a href="{{ route('services.emergency') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">emergency tyre call out</a> page has more on how far to drive. For the swap itself, we tell you the speed limit on your spare before we leave.</p>
    </article>

    <article class="guide-card">
        <h2>When your car has no spare wheel</h2>
        <p class="guide-copy">No spare is common now. Kwik Fit notes there is no UK law that says you must carry a spare. Even so, it is a real problem when a tyre splits. The RAC says its patrols attended almost 200,000 puncture breakdowns with no spare in 2018, up 84% on 2012.</p>
        <p class="guide-copy">If you are stuck, call us. We look at the tyre and tell you if it can be repaired. If it cannot, we quote a replacement tyre and fit it on the spot. You do not need a spare for that. Our <a href="{{ route('services.puncture') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">mobile puncture repair</a> page covers the repair rules, and our <a href="{{ route('services.show', 'tyre-replacement') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">mobile tyre replacement</a> page covers new tyres.</p>
        <p class="guide-copy">If you want a spare for next time, ask us when you call. We can talk through the choices for your car, such as a full size wheel. Tell us the make, the model and the year.</p>
    </article>

    <article class="guide-card">
        <h2>Changing a full set of wheels</h2>
        <p class="guide-copy">Some drivers keep a second set of wheels. Winter wheels in October and summer wheels in spring are a common example. We can change a full set at your home or workplace. Here is what to tell us:</p>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>Your registration number</li>
            <li>Whether the wheels already have tyres fitted</li>
            <li>Whether the car has locking wheel nuts, and where the key is</li>
            <li>How many wheels you want changed</li>
        </ul>
        <p class="guide-copy">A set of four takes longer than a single wheel. We confirm the time on the phone. Our <a href="{{ route('home') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">homepage</a> covers wheel swaps in brief, and our <a href="{{ route('services.show', 'tyre-replacement') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">mobile tyre replacement</a> page explains winter, summer and all season tyres.</p>
    </article>

    <article class="guide-card">
        <h2>After the swap: nuts, pressure and the next step</h2>
        <p class="guide-copy">Wheel nuts matter. Which says that even with a full size spare, a garage should retighten the bolts to the maker's torque setting. A nut that is too loose can work free, and one that is too tight can damage the stud. After a swap, do these things:</p>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>Check the pressure in the spare on the same day</li>
            <li>Drive gently and listen for knocks or a shake at speed</li>
            <li>Ask a fitter to check the wheel nut torque</li>
            <li>Get the flat tyre repaired or replaced</li>
        </ul>
        <p class="guide-copy">We tell you which of these matter most for your car.</p>
    </article>

    <article class="guide-card">
        <h2>Get the flat tyre sorted, then put the spare away</h2>
        <p class="guide-copy">A spare is a short term fix. Once the car is moving again, the flat tyre needs a decision. It can often be repaired, and a repair costs less than a new tyre. If the damage is outside the repair rules, it needs replacing. We check the tyre on site, and we can do either job in the same visit. Then the spare goes back in the boot, ready for next time.</p>
    </article>

    <article class="guide-card">
        <h2>Check your spare before you need it</h2>
        <p class="guide-copy">Few people look at the spare until the day they need it. Which warns that an old spare can perish, with cracks in the tread or sidewall. This is more likely if the spare lives outside the car, as on some big SUVs. Kwik Fit says to check a spare as often as the tyres you use every day.</p>
        <p class="guide-copy">Do these checks every few months:</p>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>Look for cracks, bulges and worn tread</li>
            <li>Check the pressure</li>
            <li>Make sure the jack, the wheel brace and the locking wheel nut adapter are in the car</li>
            <li>Know where they live, because it varies by car</li>
        </ul>
    </article>

    <article class="guide-card">
        <h2>Locking wheel nuts and spare wheels</h2>
        <p class="guide-copy">If your car has locking wheel nuts, you need the key to swap a wheel. Which says the locking nut adapter is usually kept in the boot with the spare and the jack. No key? Leave the nut alone. Our <a href="{{ route('services.locking') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">locking wheel nut removal</a> page explains what we can do, and we can fit the spare in the same visit.</p>
    </article>

    <article class="guide-card">
        <h2>How much does a spare wheel swap cost?</h2>
        <p class="guide-copy">We quote the full price before we set off. The price depends on:</p>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>Where you are and the time of day</li>
            <li>The type of vehicle, such as a car, van or 4x4</li>
            <li>Whether the spare is a full size wheel or a space saver</li>
            <li>Whether the car has locking wheel nuts and the key is missing</li>
            <li>Whether we also repair or replace the flat tyre</li>
        </ul>
        <p class="guide-copy">The price does not change when we arrive. Out of hours calls may cost more, and we tell you on the phone.</p>
    </article>

    <article class="guide-card">
        <h2>Where we swap wheels in Crawley</h2>
        <p class="guide-copy">Flat tyre near the County Mall? Stuck on a Maidenbower road or a Broadfield drive? We drive to you across the RH10 and RH11 postcode areas, from Three Bridges and Pound Hill to Tilgate, Ifield, Langley Green, Southgate, West Green and Bewbush. Company cars and vans at Manor Royal can be done in the car park. On the A23, tell us the nearest safe place to stop, and read our <a href="{{ route('services.emergency') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">emergency tyre call out</a> page if you are on the M23 at Pease Pottage.</p>
        <p class="guide-copy">We also take calls from Horley, Handcross, Crawley Down, Copthorne, Horsham and East Grinstead. Gatwick Airport car parks set their own rules, so ask the car park first. Give us your postcode and we say if we can reach you.</p>
        <p class="mt-5 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Postcodes</p>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach(['RH10', 'RH11'] as $place)
            <li class="place-chip">{{ $place }}</li>
            @endforeach
        </ul>
        <p class="mt-4 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Places</p>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach(['County Mall', 'Three Bridges', 'Pound Hill', 'Maidenbower', 'Tilgate', 'Ifield', 'Langley Green', 'Southgate', 'West Green', 'Bewbush', 'Broadfield', 'Manor Royal', 'Pease Pottage', 'Horley', 'Handcross', 'Crawley Down', 'Copthorne', 'Horsham', 'East Grinstead'] as $place)
            <li class="place-chip">{{ $place }}</li>
            @endforeach
        </ul>
    </article>

    <article class="guide-card">
        <h2>What to have ready when you call</h2>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>Your registration number and the make of the car</li>
            <li>Your postcode and where the car is parked</li>
            <li>Whether you have a full size spare, a space saver or no spare</li>
            <li>The locking wheel nut key and adapter, if the wheels have them</li>
            <li>The tyre size on the sidewall, if you can see it</li>
        </ul>
    </article>

    <article class="guide-card" id="wheels-faq">
        <h2>Questions drivers ask about spare wheels</h2>
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

    <article class="guide-card">
        <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">
            <div class="min-w-0">
                <h2>About AK Quick Mobile Tyres</h2>
                <p class="guide-copy">{{ config('company.short_name') }} is a Crawley business that works from a van. We keep it simple:</p>
                <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
                    <li>You get the price on the phone, before we set off</li>
                    <li>We show you what we find and give you the options</li>
                    <li>If the flat tyre needs work, we do it in the same visit</li>
                    <li>We never add parts you do not need</li>
                </ul>
                <p class="guide-copy">Our <a href="{{ route('home') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">homepage</a> lists every service.</p>
            </div>
            <a href="{{ $tel }}" class="btn-call w-full shrink-0 justify-center sm:w-auto">
                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                Call now
            </a>
        </div>
    </article>
</div>
