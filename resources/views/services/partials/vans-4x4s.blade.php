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
        <h2>What we fit on vans and 4x4s</h2>
        <p class="guide-copy">We fit new tyres on light commercial vehicles and on 4x4s. That covers:</p>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>Panel vans, high top vans and crew vans</li>
            <li>Pickups</li>
            <li>4x4s and SUVs</li>
            <li>Work vehicles that tow a trailer or carry a heavy load</li>
        </ul>
        <p class="guide-copy">Tell us your registration number when you call. We look up the tyre size, the load index and the speed rating before we quote. If your vehicle is very large or very heavy, say so on the phone, and we confirm that we can fit it before you book.</p>
    </article>

    <article class="guide-card">
        <h2>Van tyres: load, markings and pressure</h2>
        <p class="guide-copy">A van tyre is built for work. Goodyear says van tyres carry heavy goods, run all day and often cross building sites and industrial estates. Kwik Fit says they usually have reinforced sidewalls, and that car tyres and van tyres are not made to be swapped. Here is what to look for:</p>
        <ul class="guide-points">
            <li><strong class="font-display text-ink-950">The C mark.</strong> A C on the sidewall means the tyre was made for commercial vehicles. Kwik Fit says light commercial vehicles need C tyres.</li>
            <li><strong class="font-display text-ink-950">RF and XL.</strong> These mark reinforced and extra load tyres, which carry heavier weights.</li>
            <li><strong class="font-display text-ink-950">Load index and speed rating.</strong> Both are printed on the sidewall. Kwik Fit warns against fitting a tyre with a lower load index or speed rating than the maker advises. Your handbook has the right figures.</li>
            <li><strong class="font-display text-ink-950">Pressure.</strong> Kwik Fit says to adjust the pressure to suit the load. Too high wears the tyre unevenly. Too low raises fuel use and can lead to a blowout. Goodyear says to check the pressure every month.</li>
        </ul>
        <p class="guide-copy">Kwik Fit also says not to fit van tyres to a campervan or motorhome. If you drive one, tell us when you call.</p>
    </article>

    <article class="guide-card">
        <h2>Choosing 4x4 tyres by how you drive</h2>
        <p class="guide-copy">TyreSafe says the right tyre depends on whether you drive off road, not on whether the vehicle is a 4x4. A school run in a Land Rover needs a different tyre from a farm track. This table shows the main choices.</p>
        <div class="mt-5 grid gap-2 sm:grid-cols-2">
            @foreach([
                ['Road tyre', 'Mostly tarmac, motorways and town driving', 'Made for speed, economy and a smoother ride'],
                ['All terrain', 'Mostly road with some gravel, dirt and light mud', 'Quieter, longer lasting and more fuel efficient than mud terrain, says 4x4tyres.co.uk'],
                ['Mud terrain', 'Regular driving in deep mud and on rocky trails', 'Wears faster on tarmac and is noisier'],
                ['Rugged off road', 'Drivers who spend most of their time off road', 'TyreSafe says it responds poorly on roads and wears quickly'],
            ] as $row)
            <div class="rounded-xl border border-brand-200 bg-ink-50 p-4">
                <p class="font-display text-base font-bold leading-snug text-ink-950">{{ $row[0] }}</p>
                <p class="mt-2 text-sm leading-relaxed text-ink-700">{{ $row[1] }}</p>
                <p class="mt-1 text-sm leading-relaxed text-ink-600">{{ $row[2] }}</p>
            </div>
            @endforeach
        </div>
        <p class="guide-copy">If your week is mostly the A23, the M23 and town roads, a road tyre or an all terrain tyre is usually the better fit. Tell us how you use the vehicle and we say which type suits it.</p>
    </article>

    <article class="guide-card">
        <h2>Keep all four tyres matched on a 4x4</h2>
        <p class="guide-copy">TyreSafe says not to fit different tyre types on the same axle. On a 4x4, the front and rear tyres should match as well. Different tread patterns turn at different speeds. That puts strain on the transfer box and can make it fail.</p>
        <p class="guide-copy">So when one tyre is worn out, ask before you buy a single tyre. We check the tread on the other three, tell you what we see and explain your options.</p>
    </article>

    <article class="guide-card">
        <h2>Towing and heavy loads</h2>
        <p class="guide-copy">TyreSafe says extra load, or XL, tyres are needed for towing a trailer or for a particularly heavy vehicle. The handbook gives the exact guidance. If you tow a caravan, a horsebox or a plant trailer, tell us. We match the tyre to the load, and we check the pressure for a loaded vehicle before we leave.</p>
    </article>

    <article class="guide-card">
        <h2>When to replace van and 4x4 tyres</h2>
        <p class="guide-copy">Check the tread, the sidewalls and the pressure often. Goodyear gives the UK legal minimum tread depth as 1.6 mm for vans up to 3.5 tonnes, and 1 mm for heavier vehicles. Many fitters advise changing sooner, because grip in the wet drops as the tread wears. Replace a tyre sooner if you see:</p>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>A bulge, cut or crack in the sidewall</li>
            <li>A nail or screw close to the sidewall</li>
            <li>Uneven wear across the tread</li>
            <li>A shake or a pull to one side at speed</li>
        </ul>
        <p class="guide-copy">Goodyear says to rotate van tyres every 6,000 to 10,000 miles. It also says a coin is a quick way to check the tread, although a tread gauge is better. Our <a href="{{ route('home') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">homepage</a> has the tread and age rules. Our <a href="{{ route('services.show', 'tyre-replacement') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">mobile tyre replacement</a> page covers how to read the EU tyre label.</p>
    </article>

    <article class="guide-card">
        <h2>Winter and all season tyres for vans and 4x4s</h2>
        <p class="guide-copy">Goodyear says to think about winter tyres when temperatures fall below about 7 degrees. Winter tyres use rubber that stays softer in the cold. All season tyres save you swapping sets, and Goodyear says the three peak mountain snowflake mark shows a tyre meets winter rules in some European countries. Check the rules before you drive abroad. Our <a href="{{ route('services.show', 'tyre-replacement') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">mobile tyre replacement</a> page explains the difference between summer, winter and all season tyres.</p>
    </article>

    <article class="guide-card">
        <h2>Tyre fitting for fleets and work vehicles</h2>
        <p class="guide-copy">If you run vans from the Manor Royal business area, a mobile fitter saves the trips to a garage. Tell us how many vehicles need tyres, where they park and what sizes they use. We can work through them in one visit, so your drivers stay on the job.</p>
        <p class="guide-copy">For a fleet, it helps to have:</p>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>A list of registration numbers</li>
            <li>The tyre size and the load index for each vehicle</li>
            <li>The best time of day to reach the vehicles</li>
            <li>A contact name for the site</li>
        </ul>
    </article>

    <article class="guide-card">
        <h2>How mobile van and 4x4 tyre fitting works</h2>
        <p class="guide-copy">Here is how a visit goes:</p>
        <ol class="guide-steps">
            <li><span class="min-w-0"><strong class="font-display text-ink-950">You call <a href="{{ $tel }}">{{ config('company.phone') }}</a></strong> with your registration number and your location.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We match the size,</strong> the load index and the speed rating, then quote the full price and an arrival time.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">Our technician arrives</strong> and inspects the old tyre and the wheel.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">The new tyre goes on,</strong> the wheel goes back and the nuts are tightened to the correct torque.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">We set the pressure</strong> for your load and do a final check before we leave.</span></li>
        </ol>
        <p class="guide-copy">We need a flat, safe place with room to work around the vehicle. A depot yard, a unit car park, a driveway or a quiet street all work. If you drive a high top van, tell us the height when you call. If the wheels have locking nuts, have the key ready. Our <a href="{{ route('services.locking') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">locking wheel nut removal</a> page explains what we do if you have lost it.</p>
    </article>

    <article class="guide-card">
        <h2>How much does mobile van and 4x4 tyre fitting cost?</h2>
        <p class="guide-copy">We quote the full price before we set off. The price depends on:</p>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>The tyre size, the load index and the speed rating</li>
            <li>The brand and range, from budget tyres to Goodyear</li>
            <li>How many tyres you need</li>
            <li>Whether it is a van, a pickup or a 4x4</li>
            <li>Where you are and when you need us</li>
        </ul>
        <p class="guide-copy">Van and 4x4 tyres are bigger and tougher than car tyres, so they can cost more. Ask for the final figure, fitting included, and compare it with a garage quote. Our price stays the same on the day.</p>
    </article>

    <article class="guide-card">
        <h2>A flat tyre on a van or 4x4</h2>
        <p class="guide-copy">Do not drive on a flat tyre. It can wreck the tyre and the wheel rim. Pull over somewhere safe, switch on your hazard lights and call us. Many modern vehicles carry no spare, so we bring the tyre to you. Our <a href="{{ route('services.puncture') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">mobile puncture repair</a> page covers what can be repaired, and our <a href="{{ route('services.emergency') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">emergency tyre call out</a> page covers burst tyres and night calls. Got a spare? Our <a href="{{ route('services.wheels') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">spare wheel</a> page explains the swap.</p>
    </article>

    <article class="guide-card">
        <h2>Where we fit van and 4x4 tyres in Crawley</h2>
        <p class="guide-copy">We cover the RH10 and RH11 postcode areas. Tradesmen in Three Bridges, Pound Hill, Maidenbower, Tilgate, Ifield, Broadfield, West Green, Southgate and Bewbush can have tyres fitted on the drive before work. Manor Royal units can have them fitted in the yard. Farm and country vehicles around Crawley Down, Copthorne and Handcross are welcome too. If your vehicle is near the A23 or the M23 at Pease Pottage, tell us the nearest safe spot.</p>
        <p class="guide-copy">Calls also come from Horley, Horsham and East Grinstead. Gatwick Airport car parks have their own rules, so check with the car park before you book. Tell us your postcode and we confirm whether we can reach you.</p>
        <p class="mt-5 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Postcodes</p>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach(['RH10', 'RH11'] as $place)
            <li class="place-chip">{{ $place }}</li>
            @endforeach
        </ul>
        <p class="mt-4 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Places</p>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach(['Three Bridges', 'Pound Hill', 'Maidenbower', 'Tilgate', 'Ifield', 'Broadfield', 'West Green', 'Southgate', 'Bewbush', 'Manor Royal', 'Crawley Down', 'Copthorne', 'Handcross', 'Pease Pottage', 'Horley', 'Horsham', 'East Grinstead'] as $place)
            <li class="place-chip">{{ $place }}</li>
            @endforeach
        </ul>
    </article>

    <article class="guide-card">
        <h2>What to have ready when you call</h2>
        <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
            <li>Your registration number</li>
            <li>The tyre size on the sidewall, such as 205/65 R16 C</li>
            <li>Your postcode and where the vehicle is parked</li>
            <li>How you use it: heavy loads, towing or off road</li>
            <li>The locking wheel nut key, if the wheels have locking nuts</li>
        </ul>
    </article>

    <article class="guide-card" id="vans-faq">
        <h2>Questions drivers ask about van and 4x4 tyres</h2>
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
                <p class="guide-copy">{{ config('company.short_name') }} is a Crawley business that works from a van, so we know what a lost working day costs. Our approach:</p>
                <ul class="guide-points sm:grid-cols-2 sm:gap-x-6">
                    <li>You get the price on the phone before we set off</li>
                    <li>We say what we see and what your options are</li>
                    <li>The tyre is matched to your load and the way you use the vehicle</li>
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
