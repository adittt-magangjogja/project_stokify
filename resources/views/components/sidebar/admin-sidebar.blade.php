<x-sidebar-dashboard>
    <x-sidebar-menu-dashboard routeName="dashboard" title="Dashboard"/>

    <x-sidebar-menu-dropdown-dashboard routeName="master-data.*" title="Master Data">
        <x-sidebar-menu-dropdown-item-dashboard routeName="produk.index" title="Produk"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="kategori.index" title="Kategori"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="supplier.index" title="Supplier"/>
    </x-sidebar-menu-dropdown-dashboard>

    <x-sidebar-menu-dropdown-dashboard routeName="stok.*" title="Stok">
        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.masuk" title="Barang Masuk"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.keluar" title="Barang Keluar"/>
        <x-sidebar-menu-dropdown-item-dashboard routeName="stok.opname" title="Stock Opname"/>
    </x-sidebar-menu-dropdown-dashboard>

    <x-sidebar-menu-dashboard routeName="laporan" title="Laporan"/>
</x-sidebar-dashboard>