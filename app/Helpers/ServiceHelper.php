<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class ServiceHelper
{
    public static function index()
    {
        $services = ServicesCatalog::all();

        $meta = MetaHelper::make(
            'Mobile Tyre Services | ' . config('company.name'),
            'Emergency callouts, tyre replacement, puncture repairs, locking nut removal, wheel swaps and van/4x4 mobile tyre fitting, available 24/7.'
        );

        return view('services', compact('services', 'meta'));
    }

    public static function show(string $slug)
    {
        $service = ServicesCatalog::find($slug);

        if (!$service) {
            abort(404);
        }

        if ($slug === 'emergency-callout') {
            $meta = MetaHelper::make(
                'Emergency Tyre Call Out Crawley | 24/7 Mobile Tyre Fitter',
                'Flat or burst tyre in Crawley? Our emergency tyre call out comes to your home, work or roadside, 24/7. Price quoted first. Call 07405 726167.',
                schema: self::emergencySchemas($service['faq'] ?? [])
            );
        } elseif ($slug === 'puncture-repairs') {
            $meta = MetaHelper::make(
                'Mobile Puncture Repair Crawley | AK Quick Mobile Tyres',
                'Mobile puncture repair in Crawley at your home, work or roadside. BS AU 159 repairs, price quoted first, 24/7. Call 07405 726167.',
                schema: self::punctureSchemas($service['faq'] ?? [])
            );
        } else {
            $meta = MetaHelper::make(
                $service['title'] . ' | ' . config('company.name'),
                $service['short_description'],
                schema: !empty($service['faq'])
                    ? [
                        '@context' => 'https://schema.org',
                        '@graph' => [
                            MetaHelper::organizationSchema(),
                            MetaHelper::faqSchema($service['faq']),
                        ],
                    ]
                    : MetaHelper::organizationSchema()
            );
        }

        return view('services.show', compact('service', 'meta'));
    }

    /**
     * Emergency page schema only. Other services keep the shared organisation schema.
     */
    private static function emergencySchemas(array $faqs): array
    {
        $page = 'https://www.akquickmobiletyres.co.uk/emergency-tyre-call-out-crawley/';

        $faqSchema = MetaHelper::faqSchema($faqs);
        $faqSchema['@id'] = $page.'#faq';

        return [
            [
                '@context' => 'https://schema.org',
                '@graph' => [
                    [
                        '@type' => 'WebPage',
                        '@id' => $page.'#webpage',
                        'url' => $page,
                        'name' => 'Emergency Tyre Call Out in Crawley: Fast Help at Your Roadside, Day or Night',
                        'description' => 'Flat or burst tyre in Crawley? Our emergency tyre call out comes to your home, work or roadside, 24/7. Price quoted first. Call 07405 726167.',
                        'mainEntity' => [
                            '@id' => $page.'#service',
                        ],
                    ],
                    [
                        '@type' => 'Service',
                        '@id' => $page.'#service',
                        'name' => 'Emergency Mobile Tyre Fitting in Crawley',
                        'serviceType' => [
                            'Emergency Tyre Call Out',
                            'Mobile Tyre Fitting',
                            'Emergency Tyre Replacement',
                            'Puncture Repair',
                            'Roadside Tyre Assistance',
                            'Locking Wheel Nut Removal',
                            'Spare Wheel Fitting',
                        ],
                        'provider' => [
                            '@type' => 'AutomotiveBusiness',
                            'name' => 'AK Quick Mobile Tyres',
                            'url' => 'https://www.akquickmobiletyres.co.uk/',
                            'telephone' => '+447405726167',
                            'areaServed' => [
                                ['@type' => 'City', 'name' => 'Crawley'],
                                ['@type' => 'PostalCodeArea', 'postalCode' => 'RH10'],
                                ['@type' => 'PostalCodeArea', 'postalCode' => 'RH11'],
                                ['@type' => 'AdministrativeArea', 'name' => 'West Sussex'],
                            ],
                        ],
                        'areaServed' => [
                            '@type' => 'City',
                            'name' => 'Crawley',
                        ],
                        'availableChannel' => [
                            '@type' => 'ServiceChannel',
                            'servicePhone' => [
                                '@type' => 'ContactPoint',
                                'telephone' => '+447405726167',
                                'contactType' => 'customer service',
                                'availableLanguage' => 'English',
                            ],
                        ],
                    ],
                ],
            ],
            $faqSchema,
        ];
    }

    /**
     * Puncture page schema only. Visible FAQs are the source for the FAQ block.
     */
    private static function punctureSchemas(array $faqs): array
    {
        $page = 'https://www.akquickmobiletyres.co.uk/mobile-puncture-repair-crawley/';

        $faqSchema = MetaHelper::faqSchema($faqs);
        $faqSchema['@id'] = $page.'#faq';

        return [
            [
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                '@id' => $page.'#service',
                'name' => 'Mobile Puncture Repair in Crawley',
                'serviceType' => 'Mobile puncture repair',
                'description' => 'Mobile puncture repair in Crawley, West Sussex, at your home, workplace or a safe roadside spot. Repairs follow BS AU 159. Open 24 hours, usual arrival 30 to 60 minutes.',
                'url' => $page,
                'provider' => [
                    '@type' => 'TireShop',
                    '@id' => 'https://www.akquickmobiletyres.co.uk/#business',
                    'name' => 'AK Quick Mobile Tyres',
                    'url' => 'https://www.akquickmobiletyres.co.uk/',
                    'telephone' => '+447405726167',
                    'areaServed' => [
                        '@type' => 'City',
                        'name' => 'Crawley',
                    ],
                    'openingHoursSpecification' => [
                        [
                            '@type' => 'OpeningHoursSpecification',
                            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                            'opens' => '00:00',
                            'closes' => '23:59',
                        ],
                    ],
                ],
                'areaServed' => [
                    ['@type' => 'City', 'name' => 'Crawley'],
                    ['@type' => 'Place', 'name' => 'Three Bridges'],
                    ['@type' => 'Place', 'name' => 'Pound Hill'],
                    ['@type' => 'Place', 'name' => 'Maidenbower'],
                    ['@type' => 'Place', 'name' => 'Tilgate'],
                    ['@type' => 'Place', 'name' => 'Ifield'],
                    ['@type' => 'Place', 'name' => 'Broadfield'],
                    ['@type' => 'Place', 'name' => 'Manor Royal'],
                ],
                'availableChannel' => [
                    '@type' => 'ServiceChannel',
                    'servicePhone' => [
                        '@type' => 'ContactPoint',
                        'telephone' => '+447405726167',
                        'contactType' => 'customer service',
                    ],
                    'serviceLocation' => [
                        '@type' => 'Place',
                        'name' => 'Customer location in Crawley',
                    ],
                ],
            ],
            $faqSchema,
        ];
    }
}
