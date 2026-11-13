<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class HomeHelper
{
    public static function index()
    {
        $faqs = [
            [
                'question' => '24/7 Mobile Tyre Fitting',
                'answer' => 'Yes. AK Quick Mobile Tyres answers the phone 24 hours a day, 7 days a week, including nights, weekends and bank holidays. Call 07405 726167 with your location and tyre size. We quote the price first, then come to you.',
            ],
            [
                'question' => 'Typical Arrival Times',
                'answer' => 'Our usual arrival time is 30 to 60 minutes. It changes with traffic, how far away you are and how busy we are. We give you a time when you call.',
            ],
            [
                'question' => 'At-Home and Workplace Tyre Fitting',
                'answer' => 'Yes. We fit tyres on your drive, in a workplace car park or at the roadside. We need a flat, safe spot with room to jack the car. If the spot is unsafe, we will ask you to move to a safer place first.',
            ],
            [
                'question' => 'Tyre Fitting for Electric Cars',
                'answer' => 'Yes. We cover cars, electric cars, vans and 4x4s. Electric cars are heavy, so the tyre often needs a higher load rating. Give us your registration and we will match the right size and rating.',
            ],
            [
                'question' => 'Locking Wheel Nut Removal Without a Key',
                'answer' => 'Yes. Locking wheel nut removal is one of our services. Tell us your car make and model. Check the glovebox and the boot tool kit first, because the key is often there.',
            ],
            [
                'question' => 'Information to Provide When Booking',
                'answer' => 'Tell us your location, your car registration and the tyre size on the sidewall if you can see it. Tell us if you have the locking wheel nut key. A photo of the tyre helps.',
            ],
            [
                'question' => 'Roadside Assistance on the M23 and A23',
                'answer' => 'We can help once you are in a safe place. On the M23, call your breakdown provider or National Highways first and wait behind the barrier. On the A23, pull into a lay by or a side road if you can and keep your hazard lights on.',
            ],
            [
                'question' => 'Jump-Start and Battery Assistance',
                'answer' => 'Yes. We offer jump starts and battery recovery. Call us, tell us what the car is doing, and we will say what we can do where you are.',
            ],
            [
                'question' => 'UK Legal Tyre Tread Depth',
                'answer' => 'For cars and light vans it is 1.6 mm across the middle three quarters of the tyre and all the way round. You can be fined up to £2,500 and get 3 penalty points for each illegal tyre.',
            ],
        ];

        $meta = MetaHelper::make(
            '24/7 Mobile Tyre Fitting | AK Quick Mobile Tyres',
            'Emergency 24/7 mobile tyre fitting, puncture repair and roadside tyre assistance. We come to you for cars, EVs, vans and 4x4s. Call 07405 726167 now.',
            schema: [
                '@context' => 'https://schema.org',
                '@graph' => [
                    MetaHelper::organizationSchema(),
                    MetaHelper::faqSchema($faqs),
                ],
            ]
        );

        return view('home', [
            'meta' => $meta,
            'company' => config('company'),
            'services' => collect(ServicesCatalog::all()),
            'whyUs' => config('company.why_us'),
            'stats' => config('company.stats'),
            'faqs' => $faqs,
            'jobImages' => self::jobImages(),
            'serviceBlurbs' => self::serviceBlurbs(),
            'process' => [
                ['step' => '01', 'title' => 'Call or send the form', 'description' => 'You call '.config('company.phone').' or send the quote form. Give us your location, your car registration and the tyre size.'],
                ['step' => '02', 'title' => 'We quote first', 'description' => 'We quote the price and the arrival time before we set off.'],
                ['step' => '03', 'title' => 'We arrive and fit', 'description' => 'Our fitter arrives with a trolley jack and impact tools, and sets every wheel nut to the correct torque.'],
                ['step' => '04', 'title' => 'You drive away', 'description' => 'We repair or replace the tyre, check the job and you drive away.'],
            ],
        ]);
    }

    /**
     * Homepage card copy only. Service pages keep the catalog titles and blurbs.
     */
    public static function serviceBlurbs(): array
    {
        return [
            'emergency-callout' => [
                'title' => '24/7 Emergency Tyre Callout',
                'text' => 'A flat, a burst tyre or a warning light at 3am? We answer day and night. We quote the price first, then drive to you. Our usual arrival time is 30 to 60 minutes.',
            ],
            'tyre-replacement' => [
                'title' => 'New and Part-Worn Tyre Fitting',
                'text' => 'We fit new tyres from Goodyear and from budget brands. We also fit part worn tyres. Tell us your tyre size or your car registration and we will quote. We fit them on your drive, at work or at the roadside.',
            ],
            'puncture-repairs' => [
                'title' => 'Mobile Puncture Repairs',
                'text' => 'If the tyre can be repaired safely, we do a plug and patch repair on the spot. If it cannot, we tell you why and quote a replacement. A repair often costs less than a new tyre.',
            ],
            'locking-nut-removal' => [
                'title' => 'Locking Wheel Nut Removal',
                'text' => 'Lost the key to your locking wheel nut? We can remove the nut so the wheel can come off. Tell us your car make and model when you call.',
            ],
            'wheel-swaps-spares' => [
                'title' => 'Spare Wheel Swaps and Fitting',
                'text' => 'We can swap a flat wheel for your spare, or change a full set of wheels, at your home or work. A space saver spare has a speed limit printed on it, so get the full tyre fixed soon.',
            ],
            'vans-4x4s' => [
                'title' => 'Van and 4x4 Tyre Fitting',
                'text' => 'Vans and 4x4s carry heavy loads, so the tyre needs the right load rating. Give us the size on the sidewall and we match it.',
            ],
            'jumpstart' => [
                'title' => 'Jump-Start and Battery Assistance',
                'text' => 'A flat battery strands you just like a flat tyre. We can jump start your car where it is parked.',
            ],
            'battery-recovery' => [
                'title' => 'Battery Recovery',
                'text' => 'If the battery will not hold charge, call us and we will say what we can do on site.',
            ],
        ];
    }

    /**
     * Load recent job photos from public/front-theme/assets/img/jobs when present.
     */
    public static function jobImages(): array
    {
        $dir = public_path('front-theme/assets/img/jobs');

        if (! File::isDirectory($dir)) {
            return [];
        }

        return collect(File::files($dir))
            ->filter(fn ($file) => in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png', 'webp', 'avif'], true))
            ->sortBy(fn ($file) => $file->getFilename())
            ->map(fn ($file) => [
                'src' => asset('front-theme/assets/img/jobs/' . $file->getFilename()),
                'alt' => 'Recent mobile tyre fitting job by 24/7 AK Quick Mobile Tyres',
            ])
            ->values()
            ->all();
    }
}
