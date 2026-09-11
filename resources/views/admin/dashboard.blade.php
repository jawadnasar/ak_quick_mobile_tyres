@extends('admin.layouts.admin')
@section('title', 'Dashboard | ' . config('app.name'))

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="admin-welcome-banner">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2>Welcome to NextIn Admin</h2>
                <p class="mb-0 opacity-90">Manage your portfolio, categories, and client inquiries from one place.</p>
            </div>
            <div class="col-lg-4 mt-3 mt-lg-0 d-flex flex-wrap gap-2 justify-content-lg-end">
                <a href="{{ route('projects.add') }}" class="admin-quick-action"><i class="bi bi-plus-lg"></i> Add Project</a>
                <a href="{{ route('categories.add') }}" class="admin-quick-action"><i class="bi bi-folder-plus"></i> Add Category</a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xxl-3 col-md-6">
            <div class="card admin-stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon purple"><i class="bi bi-briefcase-fill"></i></div>
                    <div>
                        <p class="stat-label mb-1">Total Projects</p>
                        <p class="stat-value">{{ $totalProjects }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="card admin-stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon blue"><i class="bi bi-folder-fill"></i></div>
                    <div>
                        <p class="stat-label mb-1">Categories</p>
                        <p class="stat-value">{{ $totalCategories }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="card admin-stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon green"><i class="bi bi-chat-dots-fill"></i></div>
                    <div>
                        <p class="stat-label mb-1">Client Messages</p>
                        <p class="stat-value">{{ $totalFeedbacks }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="card admin-stat-card h-100">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="stat-icon orange"><i class="bi bi-globe2"></i></div>
                    <div>
                        <p class="stat-label mb-1">Public Website</p>
                        <p class="stat-value" style="font-size:1rem;"><a href="{{ route('home') }}" target="_blank" class="text-primary">View Site <i class="bi bi-box-arrow-up-right"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-2">
        <div class="col-lg-6">
            <div class="card admin-content-card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-clock-history me-1"></i> Recent Messages</span>
                    <a href="{{ route('feedbacks.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body">
                    @forelse($recentFeedbacks as $feedback)
                    <div class="admin-activity-item">
                        <div class="admin-activity-icon"><i class="bi bi-envelope"></i></div>
                        <div class="flex-grow-1 min-w-0">
                            <strong>{{ $feedback->name }}</strong>
                            <span class="text-muted small"> — {{ $feedback->title }}</span>
                            <p class="mb-0 small text-muted text-truncate">{{ Str::limit($feedback->message, 80) }}</p>
                        </div>
                        <a href="{{ route('feedbacks.view', $feedback->id) }}" class="btn btn-sm btn-light">View</a>
                    </div>
                    @empty
                    <p class="text-muted mb-0">No messages yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card admin-content-card h-100">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-collection me-1"></i> Projects by Category</span>
                    <a href="{{ route('projects.index') }}" class="btn btn-sm btn-outline-primary">Manage</a>
                </div>
                <div class="card-body">
                    @forelse($projectsByCategory as $category)
                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                        <span class="fw-medium">{{ $category->name }}</span>
                        <span class="badge rounded-pill" style="background:#701e7d;">{{ $category->projects_count }} projects</span>
                    </div>
                    @empty
                    <p class="text-muted mb-0">No categories yet. <a href="{{ route('categories.add') }}">Add one</a></p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-2">
        <div class="col-12">
            <div class="card admin-content-card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-images me-1"></i> Latest Projects</span>
                    <a href="{{ route('projects.add') }}" class="btn btn-sm btn-primary" style="background:#701e7d;border-color:#701e7d;">+ New Project</a>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table main_table mb-0">
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentProjects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->category?->name ?? '—' }}</td>
                                <td>{{ $project->created_at?->format('M d, Y') }}</td>
                                <td>
                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-muted text-center py-4">No projects yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
