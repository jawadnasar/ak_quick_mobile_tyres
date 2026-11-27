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
        <h2>What happens when you call us</h2>
        <p class="guide-copy">Tell us where you are, the make and model, and what the car does when you turn the key. A silent car and a clicking car are not always the same problem. We give you the price and an arrival time.</p>
        <p class="guide-copy">When we reach you, we look at the battery for damage before we connect anything. We then jump start the car in the correct order. If it starts, we tell you how long to drive it. If it does not, we say what we think is wrong. If the battery is too old to hold a charge, we say that and explain what we can do on site.</p>
    </article>

    <article class="guide-card">
        <h2>What we jump start, and where</h2>
        <p class="guide-copy">We help with cars, vans, 4x4s, SUVs, and hybrid and electric cars whose 12 volt battery can be jumped (more below). Small fleets and company vehicles are welcome, such as vans at a Manor Royal unit.</p>
        <p class="guide-copy">Tell us if the car is in a multi storey or underground car park. Give us the level, the bay and any height limit, so we can plan how to reach you.</p>
    </article>

    <article class="guide-card">
        <h2>What a jump start can and cannot fix</h2>
        <p class="guide-copy">A jump start gives a flat battery enough power to start the engine. It does not repair it. Which says that if a battery is too old, worn or fully drained, a jump start may not be enough and the battery will need replacing. It also says a failed jump start can point to a more serious ignition problem.</p>
        <p class="guide-copy">It works when the battery is sound but ran flat. It may not work when the battery is at the end of its life, the charging system is faulty, or the starter has failed.</p>
        <p class="guide-copy">We will not force a jump start on a damaged battery. The RAC advises against jump starting a battery that is leaking, cracked or badly corroded.</p>
    </article>

    <article class="guide-card">
        <h2>Is it really the battery? Signs to check</h2>
        <p class="guide-copy">A few quick checks help you and us. Kwik Fit and the RAC list the same early signs.</p>
        <div class="mt-5 grid gap-2">
            @foreach([
                ['Slow, weak cranking', 'Battery is low on charge', 'Call us for a jump start'],
                ['Dim headlights and dashboard lights', 'Battery is low on charge', 'Switch off all electrics and call us'],
                ['Nothing at all, no lights', 'Battery is flat or a terminal is loose', 'Check the terminals if you can, then call us'],
                ['Fast clicking when you turn the key', 'Often a flat battery, but can point to the starter', 'Call us and describe the sound'],
                ['Battery keeps going flat', 'Old battery or a charging fault', 'Get the battery and charging system tested'],
            ] as $row)
            <div class="rounded-xl border border-brand-200 bg-ink-50 p-4">
                <p class="font-display text-base font-bold leading-snug text-ink-950">{{ $row[0] }}</p>
                <p class="mt-2 text-sm leading-relaxed text-ink-700">{{ $row[1] }}</p>
                <p class="mt-1 text-sm leading-relaxed text-ink-600">{{ $row[2] }}</p>
            </div>
            @endforeach
        </div>
        <p class="guide-copy">Kwik Fit says a click can point to the starter motor, and a fairly new battery that keeps going flat can point to the alternator. That is why we ask what you hear before we leave.</p>
        <p class="guide-copy">If the central locking fails, try the spare key fob. If the steering lock has caught, turn the wheel away from the kerb. While you wait, do not keep cranking the engine, and switch off electrical items, says the RAC.</p>
    </article>

    <article class="guide-card">
        <h2>Why car batteries go flat</h2>
        <p class="guide-copy">The RAC calls flat batteries one of the most common causes of a breakdown in the UK. The usual causes:</p>
        <ul class="guide-points">
            <li><strong class="font-display text-ink-950">Lights or devices left on.</strong> Interior lights or a dashcam can drain a battery overnight.</li>
            <li><strong class="font-display text-ink-950">Short journeys.</strong> Starting an engine takes a big burst of power. Start Rescue says regular trips under 15 minutes leave a battery undercharged.</li>
            <li><strong class="font-display text-ink-950">A car left unused.</strong> Kwik Fit says batteries lose charge when they sit, so a long holiday can leave you stuck.</li>
            <li><strong class="font-display text-ink-950">Age.</strong> Kwik Fit says a standard car battery lasts about five years on average, and the RAC says three to five years. Kwik Fit suggests getting a battery checked regularly once it is over three years old.</li>
            <li><strong class="font-display text-ink-950">Cold weather.</strong> Kwik Fit says cold reduces battery power and thickens engine oil, so the starter works harder.</li>
            <li><strong class="font-display text-ink-950">Loose or dirty terminals.</strong> A poor connection stops power reaching the starter.</li>
            <li><strong class="font-display text-ink-950">A part that drains power.</strong> Kwik Fit says a faulty component can draw power when the engine is off, so the battery goes flat overnight.</li>
            <li><strong class="font-display text-ink-950">A charging fault.</strong> If the alternator does not charge, the battery runs down however new it is.</li>
        </ul>
        <p class="guide-copy">Modern cars add strain. Start Rescue says an average family car can hold more than 50 electronic control units, and many draw a little power even when parked.</p>
    </article>

    <article class="guide-card">
        <h2>Hybrid, electric and stop start cars</h2>
        <p class="guide-copy">Not every car is jumped in the same way, so tell us what you drive when you call.</p>
        <div class="mt-5 grid items-stretch gap-3 md:grid-cols-2">
            <div class="flex h-full flex-col rounded-xl border border-brand-200 bg-ink-50 p-4">
                <h3 class="mt-0 font-display text-base font-bold leading-snug text-ink-950">Hybrids and electric cars</h3>
                <p class="mt-2 text-sm leading-relaxed text-ink-600">These still have a 12 volt battery that runs the lights, locks and computers. The AA says the 12 volt battery in an electric car can be just as problematic as one in a petrol or diesel car. Which says it can usually be jump started, but you should read the handbook first. It adds that Tesla advises calling its roadside assistance before trying. The RAC says not to use a hybrid or electric car as the donor vehicle unless the maker clearly allows it.</p>
            </div>
            <div class="flex h-full flex-col rounded-xl border border-brand-200 bg-ink-50 p-4">
                <h3 class="mt-0 font-display text-base font-bold leading-snug text-ink-950">Stop start cars</h3>
                <p class="mt-2 text-sm leading-relaxed text-ink-600">Start Rescue says a modern car can restart its engine dozens of times on one commute. That is why many use AGM or EFB batteries, built for repeated restarts. If you are not sure what your car has, give us the registration number. We check before we start.</p>
            </div>
        </div>
    </article>

    <article class="guide-card">
        <h2>Can I jump start my car myself?</h2>
        <p class="guide-copy">Yes, if you have leads, a second car with a healthy 12 volt battery and the confidence to do it right. The RAC and Which say to read the handbook, switch off both engines, take off rings and keep leads clear of fans and belts. Here is the RAC order:</p>
        <ol class="guide-steps">
            <li><span class="min-w-0"><strong class="font-display text-ink-950">Red clamp</strong> to the positive (+) terminal of the flat battery.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">Other red clamp</strong> to the positive (+) terminal of the donor battery.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">Black clamp</strong> to the negative terminal of the donor battery.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">Other black clamp</strong> to bare metal on the flat car's engine.</span></li>
        </ol>
        <p class="guide-copy">Run the donor car for a few minutes, then start the flat car. Remove the clamps in reverse order. The RAC says not to crank for more than about five seconds at a time. If you are unsure, call a professional.</p>
    </article>

    <article class="guide-card">
        <h2>After the jump: keep the car running</h2>
        <p class="guide-copy">Once the car starts, do not switch it off in the next car park. The RAC and Which say to drive for at least 30 minutes, and Start Rescue says 30 to 45. Which warns that a short trip may leave the car unable to restart. The RAC adds that a full recharge takes several hours on a quality charger.</p>
        <p class="guide-copy">The RAC says to avoid heavy traffic, so a steady run on the A23 suits better than crawling through town. Then:</p>
        <ul class="guide-points">
            <li>If the cause was clear, such as a light left on, you may be fine.</li>
            <li>If it goes flat again within a few days, the battery or the charging system needs testing.</li>
            <li>If the battery is over three to five years old, plan to have it checked.</li>
        </ul>
    </article>

    <article class="guide-card">
        <h2>Jump starter or professional? And what a battery costs</h2>
        <p class="guide-copy">Kwik Fit says a rechargeable battery booster is an option because it does not need a second car. Which says to check the pack is rated for your engine size and a 12 volt battery. A booster does not fix a worn battery.</p>
        <p class="guide-copy">If the battery is finished, cost matters. The RAC lists car battery replacement in Crawley from £160 with fitting, and says the average is £214. So it pays to know whether you need a new battery or just a jump. We tell you which we think it is.</p>
        <p class="guide-copy">To avoid the call, the AA says to take regular drives of 30 minutes or more, and to use an intelligent charger on a car that is rarely used.</p>
    </article>

    <article class="guide-card">
        <h2>Where we help in and around Crawley</h2>
        <p class="guide-copy">Our jump start service covers the RH10 and RH11 postcode areas, from Three Bridges and Pound Hill to Maidenbower, Tilgate, Ifield, Broadfield and Bewbush. We also help in the Gatwick area. We help by County Mall, the railway station and the Manor Royal units. We also reach Horley, Pease Pottage, Handcross, Crawley Down, Copthorne, Horsham and East Grinstead.</p>
        <p class="guide-copy">On the A23, the A264 and the A2011, and near M23 junctions 10 and 11, we help once you are in a safe place. If your car stopped on a live road, our <a href="{{ route('services.emergency') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">emergency page</a> explains what to do first.</p>
        <p class="mt-5 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Postcodes</p>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach(['RH10', 'RH11'] as $place)
            <li class="place-chip">{{ $place }}</li>
            @endforeach
        </ul>
        <p class="mt-4 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Places</p>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach(['Three Bridges', 'Pound Hill', 'Maidenbower', 'Tilgate', 'Ifield', 'Broadfield', 'Bewbush', 'Gatwick', 'County Mall', 'Manor Royal', 'Horley', 'Pease Pottage', 'Handcross', 'Crawley Down', 'Copthorne', 'Horsham', 'East Grinstead'] as $place)
            <li class="place-chip">{{ $place }}</li>
            @endforeach
        </ul>
    </article>

    <article class="guide-card" id="jump-faq">
        <h2>Questions Crawley drivers ask</h2>
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
                <p class="guide-copy">{{ config('company.short_name') }} works from a van, so we spend our days on driveways and in car parks like yours.</p>
                <ul class="guide-points">
                    <li>You get the price on the phone before we set off</li>
                    <li>We say what we see and what your options are</li>
                    <li>We never push work you do not need</li>
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
