<?php

namespace App\Helpers\Admin;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Support\Facades\Cache;

class AdminDashboardHelper
{
    public static function clearStatsCache(): void
    {
        Cache::forget('admin.dashboard.stats');
    }

    public static function index()
    {
        $stats = Cache::remember('admin.dashboard.stats', 60, function () {
            return [
                'totalProjects' => Project::count(),
                'totalFeedbacks' => Contact::count(),
                'totalCategories' => Category::count(),
            ];
        });

        $recentFeedbacks = Contact::latest()->take(5)->get(['id', 'name', 'title', 'message', 'created_at']);
        $projectsByCategory = Category::withCount('projects')
            ->orderByDesc('projects_count')
            ->take(5)
            ->get(['id', 'name']);
        $recentProjects = Project::with('category:id,name')
            ->latest()
            ->take(5)
            ->get(['id', 'name', 'category_id', 'created_at']);

        return view('admin.dashboard', array_merge($stats, compact(
            'recentFeedbacks',
            'projectsByCategory',
            'recentProjects',
        )));
    }
}
