<?php

namespace App\Providers;

use App\Models\Project;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useTailwind();

        Route::bind('project', function (string $value) {
            if (Schema::hasColumn('projects', 'slug')) {
                return Project::where('slug', $value)
                    ->orWhere('id', $value)
                    ->firstOrFail();
            }

            return Project::where('id', $value)->firstOrFail();
        });
    }
}
