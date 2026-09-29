<header class="app-topbar fixed inset-x-0 top-0 z-50 h-14 border-b border-slate-200 bg-white/95 backdrop-blur lg:left-64">
    <div class="flex h-full items-center justify-between px-4 sm:px-6">
        <button id="toggleSidebarMobile" type="button" aria-controls="sidebar" aria-expanded="false"
            class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-slate-500 transition hover:bg-blue-50 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-200">
            <span class="sr-only">Buka atau sembunyikan navigasi</span>
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>

        <div class="flex items-center gap-3 sm:gap-4">
            <button type="button" class="relative inline-flex h-9 w-9 items-center justify-center rounded-full text-slate-500 transition hover:bg-blue-50 hover:text-blue-700" aria-label="Notifikasi">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9m-8 12h4"/></svg>
                <span class="absolute right-1.5 top-1.5 h-2 w-2 rounded-full bg-rose-500 ring-2 ring-white"></span>
            </button>
            <span class="hidden h-7 border-l border-slate-200 sm:block"></span>
            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-50 text-sm font-bold text-blue-700 ring-1 ring-blue-100">
                {{ mb_strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="hidden leading-tight sm:block">
                <p class="text-xs font-semibold text-slate-800">{{ auth()->user()->name }}</p>
                <p class="mt-0.5 text-[10px] text-slate-500">{{ auth()->user()->role->value }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded-lg px-2.5 py-2 text-xs font-semibold text-slate-500 transition hover:bg-rose-50 hover:text-rose-700">Keluar</button>
            </form>
        </div>
    </div>
</header>
