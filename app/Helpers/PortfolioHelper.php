<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioHelper
{
    public static function index(Request $request)
    {
        $query = Project::with('category')->latest();
        $activeCategory = $request->query('category');

        if ($activeCategory) {
            $query->where('category_id', $activeCategory);
        }

        $projects = $query->paginate(12)->withQueryString();
        $categories = Category::withCount('projects')->orderBy('name')->get();

        $meta = MetaHelper::make(
            'Portfolio | ' . config('company.name'),
            'Explore our portfolio of web applications, mobile apps, ERP systems, and digital solutions delivered for clients worldwide.'
        );

        return view('portfolio', compact('projects', 'categories', 'activeCategory', 'meta'));
    }

    public static function show(Project $project)
    {
        $project->load('category');
        $related = Project::where('category_id', $project->category_id)
            ->where('id', '!=', $project->id)
            ->latest()
            ->take(3)
            ->get();

        $meta = MetaHelper::make(
            $project->name . ' | Portfolio | ' . config('company.name'),
            $project->description ? \Illuminate\Support\Str::limit(strip_tags($project->description), 160) : 'View ' . $project->name . ' project by ' . config('company.name'),
            $project->image ? asset('storage/images/projects/' . $project->image) : null,
            'article'
        );

        return view('portfolio.show', compact('project', 'related', 'meta'));
    }
}
