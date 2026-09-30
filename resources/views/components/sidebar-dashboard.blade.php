<aside id="sidebar" class="app-sidebar fixed inset-y-0 left-0 z-40 hidden w-64 lg:flex" aria-label="Sidebar">
  <div class="app-sidebar-panel flex min-h-0 flex-1 flex-col border-r">
    <a href="{{ route('dashboard') }}" class="sidebar-brand flex h-20 shrink-0 items-center gap-3 border-b border-slate-100 px-5">
      @if($appLogo)
        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($appLogo) }}" class="h-11 w-11 rounded-xl object-contain" alt="Logo aplikasi" />
      @else
        <span class="stockify-mark stockify-mark-sidebar" aria-hidden="true"><svg viewBox="0 0 48 48" fill="none"><path d="m24 3 12 7-12 7-12-7 12-7Z" fill="#60A5FA"/><path d="m12 10 12 7v14l-12-7V10Z" fill="#3B82F6"/><path d="m36 10-12 7v14l12-7V10Z" fill="#2563EB"/><path d="m12 26 12 7-12 7-12-7 12-7Z" fill="#93C5FD"/><path d="m0 33 12 7v5L0 38v-5Z" fill="#60A5FA"/><path d="m24 33-12 7v5l12-7v-5Z" fill="#3B82F6"/><path d="m36 26 12 7-12 7-12-7 12-7Z" fill="#BFDBFE"/><path d="m24 33 12 7v5l-12-7v-5Z" fill="#60A5FA"/><path d="m48 33-12 7v5l12-7v-5Z" fill="#2563EB"/></svg></span>
      @endif
      <span class="flex min-w-0 flex-col leading-tight"><strong class="truncate text-base font-extrabold tracking-tight text-slate-900">Stockify</strong><small class="mt-1 truncate text-[10px] font-medium text-slate-500">Manajemen Stok Barang</small></span>
    </a>
    <div class="flex-1 overflow-y-auto px-3 py-5">
      <ul class="space-y-1">
        {{ $slot }}
      </ul>
    </div>
  </div>
</aside>

<div class="fixed inset-0 z-30 hidden bg-slate-900/30 backdrop-blur-[1px] lg:hidden" id="sidebarBackdrop"></div>
