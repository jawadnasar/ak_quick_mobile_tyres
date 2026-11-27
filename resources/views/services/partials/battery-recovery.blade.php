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
        <h2>Battery recovery versus a jump start</h2>
        <p class="guide-copy">A jump start is a temporary boost, and that is all. Battery recovery goes further. We find out why the battery is flat and fix that cause where we can.</p>
        <p class="guide-copy">Optima Batteries makes the same point. It says jumper cables and jump packs are not battery chargers. It also says an alternator is built to maintain a battery, not to fully recharge a deeply discharged one. So a car that starts after a jump can still be one cold morning away from the same problem.</p>
        <p class="guide-copy">If your car just needs a boost, our <a href="{{ route('services.show', 'jumpstart') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">jump start page</a> explains that service. If the battery keeps going flat, or a jump did not hold, this is the service you need.</p>
    </article>

    <article class="guide-card">
        <h2>How our battery recovery works</h2>
        <p class="guide-copy">We keep it simple, in four steps:</p>
        <ol class="guide-steps">
            <li><span class="min-w-0"><strong class="font-display text-ink-950">Test.</strong> We check the battery's condition and the charging system.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">Advise.</strong> We tell you whether we recommend recovery, replacement or further checks.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">Recover.</strong> We recover or replace the battery on site where possible.</span></li>
            <li><span class="min-w-0"><strong class="font-display text-ink-950">Confirm.</strong> We run a start test and leave the car ready to drive.</span></li>
        </ol>
        <p class="guide-copy">When you call, give us the make, model and registration number, and describe what the car does at the key. You get a price and a time slot before we leave. We usually arrive within 30 to 60 minutes.</p>
    </article>

    <article class="guide-card">
        <h2>How we test a battery</h2>
        <p class="guide-copy">A battery that looks fine can still be weak, and a battery that will not start the car can still be sound. Testing tells you which one you have. Voltage is the first clue.</p>
        <p class="guide-copy">Kwik Fit says to switch the engine off and let the car rest for 15 to 30 minutes before you measure. A rested, fully charged battery reads about 12.6 volts. The RAC gives a range of 12.6 to 12.8 volts. Here are the resting readings Kwik Fit lists:</p>
        <div class="mt-5 grid gap-2">
            @foreach([
                ['12.7 V', '100% charge left', 'Battery is full'],
                ['12.06 V', '50% charge left', 'Battery is half empty'],
                ['11.79 V', '30% charge left', 'Battery is low and may struggle to start'],
                ['11.31 V', '10% charge left', 'Battery is almost flat'],
                ['10.5 V', '0% charge left', 'Battery is fully flat'],
            ] as $row)
            <div class="rounded-xl border border-brand-200 bg-ink-50 p-4">
                <p class="font-display text-base font-bold leading-snug text-ink-950">{{ $row[0] }}</p>
                <p class="mt-2 text-sm leading-relaxed text-ink-700">{{ $row[1] }}</p>
                <p class="mt-1 text-sm leading-relaxed text-ink-600">{{ $row[2] }}</p>
            </div>
            @endforeach
        </div>
        <p class="guide-copy">We also check the charging side. Kwik Fit says a running engine should show about 13.5 to 14.7 volts, and the RAC gives 13.7 to 14.7. A reading well below that points to a charging fault, not just a tired battery. Kwik Fit adds that a healthy battery drops to around 10 volts while the engine cranks.</p>
        <p class="guide-copy">The RAC says modern cars with smart charging can read outside these ranges at times. That is one more reason we test on site instead of guessing.</p>
    </article>

    <article class="guide-card">
        <h2>Can a dead battery be recovered?</h2>
        <p class="guide-copy">Sometimes, yes. Optima says many batteries thought to be dead are only deeply discharged, and that they work fine once properly recharged. A car left for weeks, or lights left on overnight, can drain a battery that is otherwise healthy.</p>
        <p class="guide-copy">Recovery is less likely when the battery is worn out. The RAC says sulphate crystals can build up on the plates of a lead acid battery. That reduces its capacity and its ability to hold a charge. Corroded terminals can also stop power flowing, and cleaning them can help.</p>
        <p class="guide-copy">The RAC says repeated jump starts can also damage a battery, and that letting the voltage drop too low again and again can mean the battery needs replacing. So we do not promise a recovery that will not last. We test first and tell you what we find.</p>
    </article>

    <article class="guide-card">
        <h2>When a new battery is the honest answer</h2>
        <p class="guide-copy">Some batteries are finished. We say so, and we do not push a new one when the old one still has life in it. Here is what points to replacement:</p>
        <ul class="guide-points">
            <li>The battery is old. The RAC says batteries generally last between three and five years</li>
            <li>The battery goes flat again soon after a jump or a charge</li>
            <li>The voltage drops fast when the engine cranks</li>
            <li>The case is cracked, swollen or leaking</li>
            <li>Heavy sulphate build up or corroded terminals that cleaning does not cure</li>
            <li>Dim lights, slow starts and a battery warning light</li>
        </ul>
        <p class="guide-copy">The RAC lists these as signs of a failing battery: dimming lights, slow engine starts, a battery warning light, odd electrics and corrosion on the terminals.</p>
        <p class="guide-copy">If the battery keeps dying but is fairly new, the fault may be elsewhere. A faulty alternator is one cause. The RAC also names parasitic drain, which is a steady current draw when the car is off. We check the charging system for this reason before we fit anything.</p>
    </article>

    <article class="guide-card">
        <h2>Choosing the right replacement battery</h2>
        <p class="guide-copy">Not every battery suits every car. We match the new battery to your vehicle, and we say if we cannot supply one for it on site. Here is what we look at:</p>
        <ul class="guide-points">
            <li><strong class="font-display text-ink-950">Size and fit.</strong> The battery has to fit the tray and reach the terminals.</li>
            <li><strong class="font-display text-ink-950">Type.</strong> Start Rescue says cars with stop start often use AGM or EFB batteries, which are built for frequent restarts. Fitting a basic battery in a car that needs one of these is a mistake.</li>
            <li><strong class="font-display text-ink-950">Your handbook.</strong> It lists what the maker recommends.</li>
        </ul>
        <p class="guide-copy">On cost, the RAC lists car battery replacement in Crawley from £160 with fitting, and an average of £214. Our own price is set on the phone, before you commit.</p>
    </article>

    <article class="guide-card">
        <h2>Does my car need the new battery registered?</h2>
        <p class="guide-copy">Some do. Midtronics explains that registration tells the car a new battery has been fitted, so its charging system can reset to suit that battery. It says the step mainly applies to makes such as BMW, Mini, Volkswagen and Audi, and that the list is growing. It advises checking the maker's service information for your car.</p>
        <p class="guide-copy">Midtronics warns that skipping registration can lead to undercharging or overcharging, and that stop start may not engage. The RAC says many modern cars need their electronics reset after a battery change, and advises a professional if you are unsure.</p>
        <p class="guide-copy">So tell us your make and model when you call. If your car is one of these, we say so before the job starts.</p>
    </article>

    <article class="guide-card">
        <h2>What happens to the old battery</h2>
        <p class="guide-copy">A car battery is not an ordinary bin item. Our service includes guidance on safely disposing of the old battery. GOV.UK says retailers do not have to take back car and motorbike batteries under the portable battery scheme. So ask us where yours should go.</p>
    </article>

    <article class="guide-card">
        <h2>Cars, vans and 4x4s</h2>
        <p class="guide-copy">We help with cars, vans and 4x4s. Small fleets and company vehicles are welcome, for example vans at a Manor Royal unit. If the vehicle is in a covered car park, tell us the level and any height limit.</p>
        <p class="guide-copy">Hybrid and electric cars still carry a 12 volt battery. The AA says it can fail like any other. Send us the registration number and we check what the car needs.</p>
    </article>

    <article class="guide-card">
        <h2>While you wait for us</h2>
        <p class="guide-copy">Do not keep cranking the engine, because repeated attempts do not help a weak battery. Switch off lights, the radio and other electrics.</p>
        <p class="guide-copy">If you own a multimeter and know how to use it, a resting reading helps us. Tell us the number when you call. If you are not sure, skip it. We will test it when we arrive.</p>
    </article>

    <article class="guide-card">
        <h2>Where we help in and around Crawley</h2>
        <p class="guide-copy">Our work sits in the RH10 and RH11 postcode areas. That takes in Northgate, Southgate, West Green, Furnace Green, Langley Green, Pound Hill, Three Bridges, Maidenbower and Tilgate, plus Ifield, Broadfield and Bewbush. The Gatwick area is on our list as well.</p>
        <p class="guide-copy">Beyond town we reach Horley, Pease Pottage, Handcross, Crawley Down, Copthorne and Horsham. Parked near County Mall, or in a Manor Royal yard? Say so when you call. For a car stuck on the A23 or the A264, our <a href="{{ route('services.emergency') }}" class="font-semibold text-ink-950 underline decoration-brand-400 underline-offset-2">emergency page</a> explains what to do first.</p>
        <p class="mt-5 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Postcodes</p>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach(['RH10', 'RH11'] as $place)
            <li class="place-chip">{{ $place }}</li>
            @endforeach
        </ul>
        <p class="mt-4 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Places</p>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach(['Northgate', 'Southgate', 'West Green', 'Furnace Green', 'Langley Green', 'Pound Hill', 'Three Bridges', 'Maidenbower', 'Tilgate', 'Ifield', 'Broadfield', 'Bewbush', 'Gatwick', 'Horley', 'Pease Pottage', 'Handcross', 'Crawley Down', 'Copthorne', 'Horsham', 'County Mall', 'Manor Royal'] as $place)
            <li class="place-chip">{{ $place }}</li>
            @endforeach
        </ul>
    </article>

    <article class="guide-card" id="battery-faq">
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
                <p class="guide-copy">{{ config('company.short_name') }} is a Crawley business that works from a van. Our approach to battery work:</p>
                <ul class="guide-points">
                    <li>The price is agreed on the phone first</li>
                    <li>We test first and say what we find</li>
                    <li>We recover a battery where we can and replace it where we must</li>
                    <li>We only recommend what the car needs</li>
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
