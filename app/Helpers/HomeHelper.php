<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class HomeHelper
{
    public static function index()
    {
        $faqs = [
            [
                'question' => 'Do you offer 24/7 mobile tyre fitting?',
                'answer' => 'Yes. 24/7 AK Quick Mobile Tyres provides emergency mobile tyre assistance day and night, including weekends and bank holidays.',
            ],
            [
                'question' => 'Where do you come to?',
                'answer' => 'We come to you: roadside, at home, at work or another safe location. Tell us where you are when you call and we will head straight to you.',
            ],
            [
                'question' => 'How long does it usually take to arrive?',
                'answer' => 'Typical arrival is often around 30-60 minutes depending on your location, traffic and how busy we are. We give you a clear estimate when you call.',
            ],
            [
                'question' => 'What vehicles do you cover?',
                'answer' => 'We cover cars, EVs, vans and 4x4s with the proper jacks, impact tools and torque equipment for the job.',
            ],
            [
                'question' => 'Can you repair a puncture or only replace tyres?',
                'answer' => 'We offer both. Where a tyre is safely repairable we can carry out a professional repair. If replacement is the safer option, we supply and fit new or part-worn tyres on the spot.',
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
            'process' => [
                ['step' => '01', 'title' => 'Initial Contact', 'description' => 'Call us and tell us where you are and what problem you are dealing with.'],
                ['step' => '02', 'title' => 'We Come To You', 'description' => 'Our mobile team travels directly to your location with the right kit.'],
                ['step' => '03', 'title' => 'We Fix the Problem', 'description' => 'We repair or replace on the spot wherever possible.'],
                ['step' => '04', 'title' => 'Back on the Road', 'description' => 'Get back on your journey safely and quickly, day or night.'],
            ],
        ]);
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
