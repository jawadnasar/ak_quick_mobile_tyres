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

    public static function slugs(): array
    {
        return collect(self::all())->pluck('slug')->all();
    }
}
