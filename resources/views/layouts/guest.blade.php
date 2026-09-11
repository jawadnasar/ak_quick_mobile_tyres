<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('company.name') }} | Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('front-theme/assets/img/favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-slate-800">
    <div class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden bg-gradient-to-br from-ink-950 via-ink-900 to-brand-950 px-4 py-10 sm:px-6">
        {{-- Decorative background --}}
        <div class="pointer-events-none absolute -left-24 top-0 h-72 w-72 rounded-full bg-brand-500/20 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-24 bottom-0 h-80 w-80 rounded-full bg-brand-400/10 blur-3xl"></div>

        <div class="relative z-10 w-full max-w-md">
            {{-- Logo & branding --}}
            <div class="mb-8 text-center">
                <a href="{{ route('home') }}" class="inline-block transition hover:opacity-90">
                    <img src="{{ asset('front-theme/assets/img/logo.png') }}"
                         alt="{{ config('company.name') }}"
                         class="mx-auto h-12 w-auto sm:h-14">
                </a>
                <p class="mt-3 text-sm font-medium text-ink-300">Admin access</p>
            </div>

            {{-- Auth card --}}
            <div class="rounded-2xl border border-white/10 bg-white p-8 shadow-soft backdrop-blur-sm sm:p-10">
                {{ $slot }}
            </div>

            <p class="mt-6 text-center">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-ink-300 transition hover:text-white">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to website
                </a>
            </p>
        </div>
    </div>
</body>
</html>
