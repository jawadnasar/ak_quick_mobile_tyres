<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [
            ['loc' => route('home'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => route('about-us'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => route('services'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => route('contact'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => route('quote'), 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => route('privacy-policy'), 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['loc' => route('terms'), 'priority' => '0.3', 'changefreq' => 'yearly'],
        ];

        foreach (\App\Helpers\ServicesCatalog::all() as $service) {
            $urls[] = [
                'loc' => route('services.show', $service['slug']),
                'priority' => '0.8',
                'changefreq' => 'monthly',
            ];
        }

        return response()->view('sitemap', compact('urls'))
            ->header('Content-Type', 'application/xml');
    }
}
