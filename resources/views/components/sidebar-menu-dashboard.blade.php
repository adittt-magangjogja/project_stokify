@props(['icon' => null, 'routeName' => null, 'title' => null])
<li>
    <a href="{{ route($routeName) }}"
        class="sidebar-link {{ request()->routeIs($routeName) ? 'is-active' : '' }}">
        @if($icon)
            {{ $icon }}
        @else
            <svg class="sidebar-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                @switch($routeName)
                    @case('dashboard')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m3 10 9-7 9 7v10a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1V10Z"/>@break
                    @case('produk.index')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Zm0 0v9m8-4.5-8 4.5m0 0-8-4.5m8 4.5V21"/>@break
                    @case('kategori.index')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7.5A1.5 1.5 0 0 1 4.5 6H10l2 2h7.5A1.5 1.5 0 0 1 21 9.5v8a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 17.5v-10Z"/>@break
                    @case('supplier.index')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 7h11v10H3V7Zm11 3h4l3 3v4h-7v-7Zm-7 9a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm9 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>@break
                    @case('atribut-produk.index')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m20 13-7 7-10-10V3h7l10 10ZM7.5 7.5h.01"/>@break
                    @case('pengguna.index')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 19H4v-1a6 6 0 0 1 12 0v1Zm-6-9a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-5a3 3 0 0 1 0 6m2 4a5 5 0 0 1 3 4v1h-2"/>@break
                    @case('stok.masuk')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v12m0 0 4-4m-4 4-4-4M4 19h16"/>@break
                    @case('stok.keluar')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21V9m0 0 4 4m-4-4-4 4m-4-8h16"/>@break
                    @case('stok.opname')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 4h8l1 2h3v14H4V6h3l1-2Zm0 7 2.5 2.5L16 8"/>@break
                    @case('laporan.stok')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 19V5m0 14h17M8 15l3-4 3 2 5-7"/>@break
                    @case('laporan.transaksi')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 3h8l4 4v14H5V3h2Zm7 0v5h5M8 12h8m-8 4h8"/>@break
                    @case('laporan.aktivitas')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 2m6-2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>@break
                    @case('pengaturan')<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm0-5v2m0 14v2m9-9h-2M5 12H3m15.36-6.36-1.42 1.42M7.06 16.94l-1.42 1.42m12.72 0-1.42-1.42M7.06 7.06 5.64 5.64"/>@break
                    @default<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12h14m-7-7 7 7-7 7"/>
                @endswitch
            </svg>
        @endif
        <span sidebar-toggle-item>{{ $title }}</span>
    </a>
</li>
