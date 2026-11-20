<?php

namespace App\Helpers;

class ServicesCatalog
{
    public static function all(): array
    {
        return config('services_catalog');
    }

    public static function find(string $slug): ?array
    {
        return collect(self::all())->firstWhere('slug', $slug);
    }

    public static function url(array $service): string
    {
        if (($service['slug'] ?? null) === 'emergency-callout') {
            return route('services.emergency');
        }

        if (($service['slug'] ?? null) === 'puncture-repairs') {
            return route('services.puncture');
        }

        return route('services.show', $service['slug']);
    }

    public static function slugs(): array
    {
        return collect(self::all())->pluck('slug')->all();
    }
}
