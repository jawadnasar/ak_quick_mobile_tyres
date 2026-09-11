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

        return view('services.show', compact('service', 'meta'));
    }
}
