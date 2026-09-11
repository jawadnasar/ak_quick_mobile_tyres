<?php

return [
    'name' => '24/7 AK Quick Mobile Tyres',
    'short_name' => 'AK Quick Mobile Tyres',
    'tagline' => 'Mobile tyre fitting that comes to you',
    'description' => '24/7 AK Quick Mobile Tyres provides emergency mobile tyre fitting, puncture repairs and roadside tyre assistance across the UK. Available day and night. We come to you at the roadside, at home or at work.',
    'url' => env('APP_URL', 'https://www.akquickmobiletyres.co.uk'),
    'email' => env('COMPANY_EMAIL'), // set in .env when available; do not invent
    'quote_email' => env('QUOTE_TO_EMAIL', env('COMPANY_EMAIL')), // quote form recipient
    'phone' => '07405 726167',
    'phone_link' => '447405726167',
    'whatsapp' => env('COMPANY_WHATSAPP'), // optional
    'address' => 'United Kingdom: mobile service, we come to you',
    'availability' => 'Open 24 hours · 7 days a week',
    'founded' => null,
    'google_business' => env('COMPANY_GOOGLE_URL'), // optional Business Profile URL
    'social' => array_filter([
        'facebook' => env('COMPANY_FACEBOOK'),
        'instagram' => env('COMPANY_INSTAGRAM'),
        'google' => env('COMPANY_GOOGLE_URL'),
    ]),
    'stats' => [
        ['value' => '24/7', 'suffix' => '', 'label' => 'Callout', 'static' => true],
        ['value' => '30-60', 'suffix' => 'm', 'label' => 'Typical arrival', 'static' => true],
        ['value' => 'All', 'suffix' => '', 'label' => 'Cars, vans & EVs', 'static' => true],
    ],
    'why_us' => [
        'Answering the phone at any hour, including nights and bank holidays',
        'Quality brands supplied, including Goodyear, plus budget options',
        'Correct torque, trolley jacks and impact tools on every job',
        'Clear pricing quoted before we set off',
    ],
];
