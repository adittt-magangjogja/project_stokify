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
            @if(request()->routeIs('*.create', '*.edit', '*.detail', '*.show'))
                <button type="button" data-back-button data-fallback-url="{{ url()->previous() }}" class="mb-4 inline-flex items-center gap-2 rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 shadow-sm transition hover:bg-slate-50 focus:outline-none focus:ring-4 focus:ring-blue-100">
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M17 10a.75.75 0 0 1-.75.75H5.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 1 1 1.06 1.06l-3.22 3.22h10.69A.75.75 0 0 1 17 10Z" clip-rule="evenodd"/></svg>
                    Kembali
                </button>
            @endif
            @yield('content')
        </main>

        <x-footer-dashboard/>

    </div>

</div>

<dialog id="delete-confirm-dialog" aria-labelledby="delete-confirm-title" aria-describedby="delete-confirm-description" class="m-auto w-[calc(100%-2rem)] max-w-lg overflow-visible rounded-2xl bg-transparent p-0 shadow-[0_24px_70px_rgba(15,23,42,0.18)] backdrop:bg-slate-950/40">
    <div class="relative rounded-2xl bg-white px-5 pb-5 pt-14 text-center sm:px-7 sm:pb-6 sm:pt-16">
        <div class="absolute left-1/2 top-0 flex h-24 w-24 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-white shadow-[0_14px_35px_rgba(15,23,42,0.08)]">
            <div class="flex h-[4.25rem] w-[4.25rem] items-center justify-center rounded-full bg-rose-50 text-rose-600">
                <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h16M10 11v6m4-6v6M5.5 7l1 13h11l1-13M9 7V4h6v3"/></svg>
            </div>
        </div>
        <button type="button" data-delete-cancel aria-label="Tutup" class="absolute right-5 top-5 rounded-full p-2 text-slate-400 transition hover:bg-slate-100 hover:text-slate-700 sm:right-7 sm:top-7"><svg class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path d="M4.2 4.2a.75.75 0 0 1 1.06 0L10 8.94l4.74-4.74a.75.75 0 1 1 1.06 1.06L11.06 10l4.74 4.74a.75.75 0 1 1-1.06 1.06L10 11.06l-4.74 4.74a.75.75 0 0 1-1.06-1.06L8.94 10 4.2 5.26a.75.75 0 0 1 0-1.06Z"/></svg></button>
        <h2 id="delete-confirm-title" class="text-lg font-bold tracking-tight text-slate-900 sm:text-xl">Hapus data ini?</h2>
        <p id="delete-confirm-description" class="mx-auto mt-3 max-w-md text-sm font-medium leading-6 text-slate-500">Data <strong id="delete-confirm-name" class="break-words font-semibold text-slate-700"></strong> akan dihapus. Tindakan ini tidak dapat dibatalkan.</p>
        <div class="mt-5 flex flex-col-reverse items-stretch justify-end gap-2 sm:flex-row sm:items-center sm:gap-3">
            <button type="button" data-delete-cancel class="rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 hover:text-slate-900">Batal</button>
            <form id="delete-confirm-form" method="POST" action="">@csrf @method('DELETE')<button id="delete-confirm-submit" type="submit" class="w-full rounded-xl bg-rose-600 px-6 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-rose-700 focus:outline-none focus:ring-4 focus:ring-rose-200 sm:w-auto">Hapus</button></form>
        </div>
    </div>
</dialog>
</body>
</html>
