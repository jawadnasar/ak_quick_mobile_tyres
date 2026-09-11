@props(['title' => 'Filters'])

<div class="admin-filter-card">
    <div class="filter-title">
        <i class="bi bi-funnel"></i> {{ $title }}
    </div>
    <div class="admin-filter-grid">
        {{ $slot }}
    </div>
</div>
