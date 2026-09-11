<?php

namespace App\Helpers;

class MetaHelper
{
    public static function make(
        string $title,
        ?string $description = null,
        ?string $image = null,
        ?string $type = 'website',
        ?array $schema = null,
    ): array {
        $company = config('company');
        $description = $description ?? $company['description'];
        $image = $image ?? asset('front-theme/assets/img/hero-carousel/hero-carousel-1.webp');
        $url = url()->current();

        return [
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'url' => $url,
            'type' => $type,
            'schema' => $schema ?? self::organizationSchema(),
        ];
    }

    public static function organizationSchema(): array
    {
        $company = config('company');

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'AutomotiveBusiness',
            'name' => $company['name'],
            'url' => $company['url'],
            'logo' => asset('front-theme/assets/img/logo.png'),
            'image' => asset('front-theme/assets/img/logo.png'),
            'description' => $company['description'],
            'telephone' => $company['phone'],
            'areaServed' => [
                '@type' => 'Country',
                'name' => 'United Kingdom',
            ],
            'openingHoursSpecification' => [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => [
                    'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday',
                ],
                'opens' => '00:00',
                'closes' => '23:59',
            ],
            'priceRange' => '££',
            'currenciesAccepted' => 'GBP',
            'paymentAccepted' => 'Cash, Credit Card, Debit Card',
        ];

        if (! empty($company['email'])) {
            $schema['email'] = $company['email'];
        }

        $sameAs = array_values(array_filter($company['social'] ?? []));
        if ($sameAs) {
            $schema['sameAs'] = $sameAs;
        }

        return $schema;
    }

    public static function faqSchema(array $faqs): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($faqs)->map(fn ($faq) => [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer'],
                ],
            ])->values()->all(),
        ];
    }
}
