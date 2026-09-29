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
<body class="dashboard-shell min-h-screen bg-slate-100 font-sans text-slate-800 antialiased">
    
<x-navbar-dashboard/>
<div id="navigation-progress" class="navigation-progress" aria-hidden="true"></div>

<div class="min-h-screen bg-[#f5f8fd] pt-14">

@if (auth()->user()->role->value === 'Manajer Gudang')
    <x-sidebar.manager-sidebar/>

@elseif (auth()->user()->role->value === 'Staff Gudang')
    <x-sidebar.staff-sidebar/>

@else
    <x-sidebar.admin-sidebar/>
@endif
        

    <div id="main-content" class="relative min-h-[calc(100vh-3.5rem)] bg-[#f5f8fd] transition-[margin] duration-200 lg:ml-64">

        <main class="min-h-[calc(100vh-10rem)] px-4 py-6 sm:px-6 lg:px-7">
            @yield('content')
        </main>

        <x-footer-dashboard/>

    </div>

</div>
</body>
</html>
