<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="#">
    <meta name="author" content="#">
    <meta name="generator" content="Laravel">

    <title>{{ $appName ?? config('app.name', 'Stockify') }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="canonical" href="{{ request()->fullUrl() }}">

    @if(isset($page->params['robots']))
        <meta name="robots" content="{{ $page->params['robots'] }}">
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" href="/favicon.ico">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:title" content="title">
    <meta name="twitter:description" content="description">
    <meta name="twitter:image" content="#">
    <!-- Facebook -->
    <meta property="og:url" content="#">
    <meta property="og:title" content="title">
    <meta property="og:description" content="description">
    <meta property="og:type" content="website">
    <meta property="og:image" content="#">
    <meta property="og:image:type" content="image/png">

</head>
@php
    $whiteBg = isset($params['white_bg']) && $params['white_bg'];
@endphp
<body class="dashboard-shell min-h-screen bg-[#f4f7fc] font-sans text-slate-800 antialiased">
    
<x-navbar-dashboard/>
<div id="navigation-progress" class="navigation-progress" aria-hidden="true"></div>

<div class="min-h-screen bg-[#f4f7fc] pt-14">

@if (auth()->user()->role->value === 'Manajer Gudang')
    <x-sidebar.manager-sidebar/>

@elseif (auth()->user()->role->value === 'Staff Gudang')
    <x-sidebar.staff-sidebar/>

@else
    <x-sidebar.admin-sidebar/>
@endif
        

    <div id="main-content" class="relative min-h-[calc(100vh-3.5rem)] bg-[#f4f7fc] transition-[margin] duration-200 lg:ml-64">

        <main class="min-h-[calc(100vh-10rem)] px-4 py-6 sm:px-6 lg:px-7">
            @yield('content')
        </main>

        <x-footer-dashboard/>

    </div>

</div>

<dialog id="delete-confirm-dialog" class="w-[calc(100%-2rem)] max-w-md rounded-2xl p-0 shadow-2xl backdrop:bg-slate-950/50">
    <div class="relative overflow-hidden rounded-2xl bg-white p-6 sm:p-7">
        <div class="absolute inset-x-0 top-0 h-1.5 bg-gradient-to-r from-rose-400 via-red-500 to-orange-400"></div>
        <div class="flex items-start gap-4">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-rose-50 text-rose-600">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v4m0 4h.01M10.3 3.9 2.8 17a2 2 0 0 0 1.7 3h15a2 2 0 0 0 1.7-3l-7.5-13.1a2 2 0 0 0-3.4 0Z"/></svg>
            </div>
            <div class="min-w-0 flex-1 pt-0.5">
                <h2 class="text-lg font-bold text-slate-900">Hapus data ini?</h2>
                <p class="mt-1 text-sm leading-6 text-slate-600">Data <strong id="delete-confirm-name" class="break-words font-semibold text-slate-800"></strong> akan dihapus. Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <button type="button" data-delete-cancel aria-label="Tutup" class="rounded-lg p-1.5 text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"><svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M4.2 4.2a.75.75 0 0 1 1.06 0L10 8.94l4.74-4.74a.75.75 0 1 1 1.06 1.06L11.06 10l4.74 4.74a.75.75 0 1 1-1.06 1.06L10 11.06l-4.74 4.74a.75.75 0 0 1-1.06-1.06L8.94 10 4.2 5.26a.75.75 0 0 1 0-1.06Z"/></svg></button>
        </div>
        <div class="mt-7 flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
            <button type="button" data-delete-cancel class="rounded-xl border border-slate-200 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">Batal</button>
            <form id="delete-confirm-form" method="POST" action="">@csrf @method('DELETE')<button type="submit" class="w-full rounded-xl bg-rose-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-rose-700 focus:outline-none focus:ring-4 focus:ring-rose-200 sm:w-auto">Ya, hapus</button></form>
        </div>
    </div>
</dialog>
</body>
</html>
