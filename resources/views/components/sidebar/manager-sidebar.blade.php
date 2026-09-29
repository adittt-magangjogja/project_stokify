<x-sidebar-dashboard>
    <li class="sidebar-section-label">Workspace</li>
    <x-sidebar-menu-dashboard routeName="dashboard" title="Dashboard"/>

    <li class="sidebar-section-label">Persediaan</li>
    <x-sidebar-menu-dashboard routeName="produk.index" title="Produk"/>
    <x-sidebar-menu-dashboard routeName="stok.masuk" title="Barang masuk"/>
    <x-sidebar-menu-dashboard routeName="stok.keluar" title="Barang keluar"/>
    <x-sidebar-menu-dashboard routeName="stok.opname" title="Stock opname"/>
    <x-sidebar-menu-dashboard routeName="supplier.index" title="Supplier"/>

    <li class="sidebar-section-label">Laporan</li>
    <x-sidebar-menu-dashboard routeName="laporan.stok" title="Laporan stok"/>
    <x-sidebar-menu-dashboard routeName="laporan.transaksi" title="Laporan transaksi"/>
</x-sidebar-dashboard>
