@extends('layouts.app')

@section('content')
<x-page-hero :title="$project->name" :breadcrumb="[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Portfolio', 'url' => route('portfolio')],
    ['label' => $project->name, 'url' => route('portfolio.show', $project)],
]">
    @if($project->category){{ $project->category->name }}@endif
</x-page-hero>

<section class="section-padding bg-white">
    <div class="container-site">
        <div class="grid gap-12 lg:grid-cols-2">
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-slate-50">
                @if($project->image)
                <img src="{{ asset('storage/images/projects/' . $project->image) }}"
                     alt="{{ $project->name }} screenshot"
                     class="w-full object-cover"
                     width="800"
                     height="500">
                @else
                <div class="flex aspect-video items-center justify-center text-slate-400">
                    <span>No image available</span>
                </div>
                @endif
            </div>
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Project Overview</h2>
                @if($project->description)
                <div class="mt-4 text-slate-600 leading-relaxed">
                    {!! nl2br(e($project->description)) !!}
                </div>
                @else
                <p class="mt-4 text-slate-600">A custom solution delivered by {{ config('company.name') }}.</p>
                @endif

                <div class="mt-8 flex flex-wrap gap-4">
                    @if($project->link)
                    <a href="{{ $project->link }}" target="_blank" rel="noopener noreferrer" class="btn-primary">
                        Visit Live Project
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    </a>
                    @endif
                    <a href="{{ route('contact') }}" class="btn-secondary">Start Similar Project</a>
                </div>
            </div>
        </div>

        @if($related->isNotEmpty())
        <div class="mt-20">
            <h2 class="text-2xl font-bold text-slate-900">Related Projects</h2>
            <div class="mt-8 grid gap-6 sm:grid-cols-3">
                @foreach($related as $item)
                <a href="{{ route('portfolio.show', $item->slug ?? $item->id) }}" class="card group block">
                    @if($item->image)
                    <img src="{{ asset('storage/images/projects/' . $item->image) }}"
                         alt="{{ $item->name }}"
                         class="mb-4 rounded-xl"
                         loading="lazy"
                         width="300"
                         height="180">
                    @endif
                    <h3 class="font-semibold text-slate-900 group-hover:text-brand-600">{{ $item->name }}</h3>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
