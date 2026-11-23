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
        <h2>How mobile locking wheel nut removal works</h2>
        <p class="guide-copy">A locking wheel nut is a wheel nut with a special head. Only a matching key fits it, and that is the point. Car makers fit them to stop wheel thieves. The same lock stops you when the key goes missing. Here is the order we work in:</p>
        <ol class="guide-steps sm:grid-cols-2">
            <li><span class="min-w-0"><strong class="font-display text-ink-950">You call <a href="{{ $tel }}">{{ config('company.phone') }}</a></strong> and tell us the car, the problem and where you are.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We quote the full price</strong> and give you an arrival time.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">Our technician arrives</strong> and looks at the lock, the wheel and the other nuts.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We remove the locking nut</strong> with the right tool for that lock.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We check the wheel and the stud</strong> for damage and show you the result.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We refit the wheel</strong> if the job needs it, and tighten the nuts to the correct torque.</span></li>
        </ol>
        <p class="guide-copy">You need a flat, safe spot with room to work. A driveway, a staff car park or a quiet street is fine. If you are at the roadside, switch on your hazard lights and stay away from traffic.</p>
    </article>

    <article class="guide-card">
        <h2>Why your car has locking wheel nuts</h2>
        <p class="guide-copy">Car makers fit locking nuts to deter wheel theft, and alloy wheels are the usual target, says AutoExpress. A set has four locking nuts, one on each wheel, and one key. The other nuts on each wheel are normal.</p>
        <p class="guide-copy">The key matters, because the lock is only as good as the key. AutoExpress adds that each maker uses a limited number of patterns, so a stranger can own a key that fits your nuts. That is one reason we ask for proof that the car is yours before we remove a lock. It keeps honest owners safe and it keeps thieves out.</p>
    </article>

    <article class="guide-card">
        <h2>Check these places before you call</h2>
        <p class="guide-copy">Before you call, a quick search can save you the cost of a visit. AutoExpress lists the usual hiding places:</p>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>The glovebox</li>
            <li>Under the boot floor, near the spare wheel or the tyre repair kit</li>
            <li>Storage pockets at the sides of the boot</li>
            <li>Under the seats, in seat pockets and in door bins</li>
            <li>The centre console</li>
        </ul>
        <p class="guide-copy">Keys often live in a small plastic box or bag with the spare nuts. If a garage had the wheels off for a service or a brake job, ask them where they left the key. If you bought the car second hand, the last owner may have lost it without telling you.</p>
        <p class="guide-copy">Found nothing? Call us. We can remove the nut without the key, so you do not need to wait for a part to arrive.</p>
    </article>

    <article class="guide-card">
        <h2>Types of locking wheel nut</h2>
        <p class="guide-copy">Not all locks are the same. The lock decides how long the job takes. AutoExpress describes three main types, and Checkatrade notes that some systems take longer than others.</p>
        <div class="mt-5 grid gap-2">
            @foreach([
                ['Keyed head', 'The nut has an odd shaped head that only the matching key fits', 'The technician needs a tool that grips the head without the key'],
                ['Rotating collar', 'A free spinning ring stops a normal socket from gripping', 'The technician needs another way to hold the nut'],
                ['Shear off bolt', 'The head snaps off if you use the wrong tool', 'Used on cars with removable wheel bolts, so it needs great care'],
                ['Systems such as McGuard', 'A tougher design with a more complex pattern', 'Checkatrade says these take longer'],
            ] as $row)
            <div class="rounded-xl border border-brand-200 bg-ink-50 p-4">
                <p class="font-display text-base font-bold leading-snug text-ink-950">{{ $row[0] }}</p>
                <p class="mt-2 text-sm leading-relaxed text-ink-700">{{ $row[1] }}</p>
                <p class="mt-1 text-sm leading-relaxed text-ink-600">{{ $row[2] }}</p>
            </div>
            @endforeach
        </div>
        <p class="guide-copy">Tell us your car make and model when you call. We can say what lock it usually has.</p>
    </article>

    <article class="guide-card">
        <h2>Can removal damage my wheels or nuts</h2>
        <p class="guide-copy">A proper removal should not. Checkatrade says the careful methods cause little damage, while forced methods can ruin the nut and the lacquer and powder coating on alloy wheels. AutoExpress says breakdown services, tyre fitters and mechanics with the right kit can take the nuts off without harming the alloys. It also warns that home removal kits give uneven results and can damage the wheel or the nut.</p>
        <p class="guide-copy">That is why we say: do not hammer a socket onto a rounded nut, and do not drill it yourself. A failed try can turn a quick job into a longer one. Checkatrade notes that a failed earlier attempt can add about £40 in labour.</p>
        <p class="guide-copy">Two things can make any removal harder. One is a nut that was tightened far too hard at the last fitting. The other is a lock that has already been rounded off. If we see damage, we tell you before we go further.</p>
    </article>

    <article class="guide-card">
        <h2>Locking nut removal and what comes next</h2>
        <p class="guide-copy">Once the old lock is off, you have three simple choices:</p>
        <div class="mt-5 grid items-stretch gap-3 md:grid-cols-3">
            <div class="flex h-full flex-col rounded-xl border border-brand-200 bg-ink-50 p-4">
                <h3 class="mt-0 font-display text-base font-bold leading-snug text-ink-950">Fit standard nuts</h3>
                <p class="mt-2 text-sm leading-relaxed text-ink-600">The wheel is held on by normal nuts, and anyone can take them off. This is the cheapest choice, but you lose the theft protection.</p>
            </div>
            <div class="flex h-full flex-col rounded-xl border border-brand-200 bg-ink-50 p-4">
                <h3 class="mt-0 font-display text-base font-bold leading-snug text-ink-950">Fit a new locking set</h3>
                <p class="mt-2 text-sm leading-relaxed text-ink-600">You get a fresh set of four locks and one key. Keep the key safe this time.</p>
            </div>
            <div class="flex h-full flex-col rounded-xl border border-brand-200 bg-ink-50 p-4">
                <h3 class="mt-0 font-display text-base font-bold leading-snug text-ink-950">Order a replacement key</h3>
                <p class="mt-2 text-sm leading-relaxed text-ink-600">A dealer can supply one using the lock code. The code is often in the handbook, on the nut box or bag, or on a card with the radio code. Eden Tyres notes that a new key can cost more than a new universal set.</p>
            </div>
        </div>
        <p class="guide-copy">No code? AutoExpress says some firms can match the key from a photo of the nut. They may ask for proof, such as a photo of your V5C. Ask us which option fits your car and your budget.</p>
    </article>

    <article class="guide-card">
        <h2>How much does locking wheel nut removal cost?</h2>
        <p class="guide-copy">Checkatrade's 2023 cost guide gives these UK figures:</p>
        <div class="mt-5 grid gap-2 sm:grid-cols-2">
            @foreach([
                ['One locking nut', '£40 to £60, averaging £50'],
                ['All four nuts', '£55 to £85, averaging about £70'],
                ['Mobile service, one nut', '£57.50 to £62.50'],
                ['Mobile service, four nuts', '£75 to £85'],
            ] as $row)
            <div class="rounded-xl border border-brand-200 bg-ink-50 p-4">
                <p class="font-display text-sm font-bold leading-snug text-ink-950">{{ $row[0] }}</p>
                <p class="mt-1.5 text-sm leading-relaxed text-ink-600">{{ $row[1] }}</p>
            </div>
            @endforeach
        </div>
        <p class="guide-copy">Prices have moved since 2023, so treat these as a guide. The price depends on how many nuts need removing, the type of lock, and how far we travel. Out of hours calls may cost more, and we tell you on the phone. At {{ config('company.short_name') }} we quote the full price before we set off, and the price does not change when we arrive.</p>
    </article>

    <article class="guide-card">
        <h2>Locking nut removal with a flat tyre or a tyre change</h2>
        <p class="guide-copy">Many people find out about the missing key at the worst time. You have a flat tyre, you open the boot, and the key is gone. You cannot fit the spare without it.</p>
        <p class="guide-copy">Do not drive on a flat tyre to look for the key. Pull over, switch on your hazard lights and call us. We remove the locking nut and then repair or replace the tyre in the same visit. Our <a href="{{ route('services.puncture') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">mobile puncture repair</a> page explains what can be repaired. For burst tyres and night calls, read our <a href="{{ route('services.emergency') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">emergency tyre call out</a> page. If your tyres are worn, our <a href="{{ route('services.show', 'tyre-replacement') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">mobile tyre replacement</a> page covers how we fit new ones.</p>
        <p class="guide-copy">The same goes for a planned job. If you book new tyres and the key is missing, tell us when you call. We can do the removal and the fitting in one visit.</p>
    </article>

    <article class="guide-card">
        <h2>Stuck, rounded or broken locking nuts</h2>
        <p class="guide-copy">Some calls are not about a lost key at all. We also help when:</p>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>The key is rounded and slips round the nut</li>
            <li>The key snapped in the lock</li>
            <li>A previous fitter damaged the nut</li>
            <li>The nut is seized after years on the car</li>
            <li>The key fits, but the nut will not move</li>
        </ul>
        <p class="guide-copy">If your key is rounded, stop using it. Each turn makes the lock worse. Leave the nut alone and call us. We look at the damage and pick the right tool for it.</p>
    </article>

    <article class="guide-card">
        <h2>Time needed for locking wheel nut removal</h2>
        <div class="mt-4 grid gap-2 sm:grid-cols-2">
            <div class="rounded-xl bg-brand-500 p-4 text-white">
                <p class="font-display text-3xl font-bold leading-none">30 min</p>
                <p class="mt-2 text-sm leading-snug text-brand-100">About half an hour for four nuts, says Checkatrade. Longer for locks such as McGuard.</p>
            </div>
            <div class="rounded-xl border border-brand-200 bg-ink-50 p-4">
                <p class="font-display text-3xl font-bold leading-none text-ink-950">30–60</p>
                <p class="mt-2 text-sm leading-snug text-ink-600">Minutes. Our usual arrival time in Crawley for urgent jobs.</p>
            </div>
        </div>
        <p class="guide-copy">AutoExpress suggests expecting no more than half an hour of labour per wheel for a garage job. A single nut usually takes less time. A damaged or seized nut can take longer, and we tell you if it does.</p>
        <p class="guide-copy">Our usual arrival time in Crawley is 30 to 60 minutes for urgent jobs, depending on traffic and how many calls we have. For planned jobs, call and we agree a time.</p>
    </article>

    <article class="guide-card">
        <h2>Can you remove a locking wheel nut at the roadside?</h2>
        <p class="guide-copy">Yes, when the spot is safe. A lay by, a quiet side road or a car park works. A hard shoulder on a fast road does not. On a motorway, National Highways says to go left, get safe and get help. Leave the car by the left hand doors if you can, and wait behind the barrier. Call us once you are safe, and we tell you what to expect. If we think the spot is too risky for the work, we say so, and we suggest a safer place first.</p>
    </article>

    <article class="guide-card">
        <h2>Locking nuts on vans and company cars</h2>
        <p class="guide-copy">Vans and fleet cars often change hands, and keys get lost between drivers. If you run vehicles from the Manor Royal business area, tell us how many have locking nuts and where they are parked. We can work through them in one visit, so a van is not off the road for a day. Give us the make and model of each one so we can plan the tools.</p>
    </article>

    <article class="guide-card">
        <h2>Keep your next key safe</h2>
        <p class="guide-copy">A few habits stop this happening again:</p>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>Keep the key in the glovebox, in the same spot every time</li>
            <li>Take a photo of the lock code card and store it on your phone</li>
            <li>Ask your garage to give the key back after every service</li>
            <li>Tell any new driver of the car where the key is kept</li>
        </ul>
    </article>

    <article class="guide-card">
        <h2>Where we remove locking wheel nuts in Crawley</h2>
        <p class="guide-copy">Stuck outside a Three Bridges flat, in a Maidenbower cul de sac or on a Broadfield drive? We come to you in the RH10 and RH11 postcode areas. That covers Pound Hill, Tilgate, Furnace Green, Ifield, Langley Green, Southgate, Northgate, West Green and Bewbush. If the car is near the A23 or the M23 at Pease Pottage, tell us the nearest safe spot.</p>
        <p class="guide-copy">Calls also come from Horley, Handcross, Crawley Down, Copthorne, Horsham and East Grinstead. Gatwick Airport car parks set their own rules, so check with the car park before you book. Give us your postcode and we confirm if we can reach you.</p>
        <p class="mt-5 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Postcodes</p>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach(['RH10', 'RH11'] as $place)
            <li class="place-chip">{{ $place }}</li>
            @endforeach
        </ul>
        <p class="mt-4 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Places</p>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach(['Three Bridges', 'Pound Hill', 'Maidenbower', 'Tilgate', 'Furnace Green', 'Ifield', 'Langley Green', 'Southgate', 'Northgate', 'West Green', 'Bewbush', 'Broadfield', 'Pease Pottage', 'Horley', 'Handcross', 'Crawley Down', 'Copthorne', 'Horsham', 'East Grinstead'] as $place)
            <li class="place-chip">{{ $place }}</li>
            @endforeach
        </ul>
    </article>

    <article class="guide-card">
        <h2>What to have ready when you call</h2>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>Your vehicle registration number and make</li>
            <li>Where the car is parked and your postcode</li>
            <li>Whether you have the key, a broken key or no key</li>
            <li>The lock code card, if you can find it</li>
            <li>Papers or ID that show the car is yours, such as your V5C</li>
        </ul>
    </article>

    <article class="guide-card" id="locking-faq">
        <h2>Questions drivers ask about locking wheel nuts</h2>
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
                <p class="guide-copy">{{ config('company.short_name') }} is a Crawley business, and our technician works from a van. Our approach is simple:</p>
                <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
                    <li>The price is agreed on the phone, not on your drive</li>
                    <li>We explain what we find and what your choices are</li>
                    <li>We do not push parts you do not need</li>
                    <li>If a tyre needs help as well, we deal with it in the same visit</li>
                </ul>
                <p class="guide-copy">Our <a href="{{ route('home') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">homepage</a> has the full list of services.</p>
            </div>
            <a href="{{ $tel }}" class="btn-call w-full shrink-0 justify-center sm:w-auto">
                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                Call now
            </a>
        </div>
    </article>
</div>
