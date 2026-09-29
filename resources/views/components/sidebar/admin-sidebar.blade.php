<x-sidebar-dashboard>
    <li class="sidebar-section-label">Workspace</li>
    <x-sidebar-menu-dashboard routeName="dashboard" title="Dashboard"/>

    <li class="sidebar-section-label">Master data</li>
    <x-sidebar-menu-dashboard routeName="produk.index" title="Produk"/>
    <x-sidebar-menu-dashboard routeName="kategori.index" title="Kategori"/>
    <x-sidebar-menu-dashboard routeName="supplier.index" title="Supplier"/>
    <x-sidebar-menu-dashboard routeName="atribut-produk.index" title="Atribut produk"/>
    <x-sidebar-menu-dashboard routeName="pengguna.index" title="Pengguna"/>

    <li class="sidebar-section-label">Operasional</li>
    <x-sidebar-menu-dashboard routeName="stok.opname" title="Stock opname"/>

    <li class="sidebar-section-label">Analisis & pengaturan</li>
    <x-sidebar-menu-dashboard routeName="laporan.stok" title="Laporan stok"/>
    <x-sidebar-menu-dashboard routeName="laporan.transaksi" title="Laporan transaksi"/>
    <x-sidebar-menu-dashboard routeName="laporan.aktivitas" title="Aktivitas pengguna"/>
    <x-sidebar-menu-dashboard routeName="pengaturan" title="Pengaturan"/>
</x-sidebar-dashboard>
