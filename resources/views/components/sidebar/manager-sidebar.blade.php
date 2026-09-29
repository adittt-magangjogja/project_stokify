<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform
           bg-gray-800 border-r border-gray-700">

    <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-800">

        <ul class="space-y-2 font-medium">

            {{-- DASHBOARD --}}
            <li>
                <a href="{{ route('dashboard.manager') }}"
                   class="flex items-center p-3 text-white rounded-lg hover:bg-gray-700">

                    <svg class="w-6 h-6 text-gray-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6"/>
                    </svg>

                    <span class="ml-3">Dashboard</span>
                </a>
            </li>


            {{-- PRODUK --}}
            <li>
                <button type="button"
                        class="flex items-center w-full p-3 text-white rounded-lg hover:bg-gray-700"
                        data-collapse-toggle="menu-produk-manager">

                    <svg class="w-6 h-6 text-gray-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7"/>
                    </svg>

                    <span class="flex-1 ml-3 text-left">Produk</span>

                    <svg class="w-3 h-3"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 10 6">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <ul id="menu-produk-manager" class="hidden py-2 space-y-2">

                    <li>
                        <a href="{{ route('produk.index') }}"
                           class="flex items-center w-full p-2 pl-11 text-gray-300 rounded-lg hover:bg-gray-700">
                            Daftar Produk
                        </a>
                    </li>

                </ul>
            </li>


            {{-- STOK --}}
            <li>
                <button type="button"
                        class="flex items-center w-full p-3 text-white rounded-lg hover:bg-gray-700"
                        data-collapse-toggle="menu-stok-manager">

                    <svg class="w-6 h-6 text-gray-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m0 0L4 7"/>
                    </svg>

                    <span class="flex-1 ml-3 text-left">Stok</span>

                    <svg class="w-3 h-3"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 10 6">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <ul id="menu-stok-manager" class="hidden py-2 space-y-2">

                    <li>
                        <a href="{{ route('stok.masuk') }}"
                           class="flex items-center w-full p-2 pl-11 text-gray-300 rounded-lg hover:bg-gray-700">
                            Barang Masuk
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('stok.keluar') }}"
                           class="flex items-center w-full p-2 pl-11 text-gray-300 rounded-lg hover:bg-gray-700">
                            Barang Keluar
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('stok.opname') }}"
                           class="flex items-center w-full p-2 pl-11 text-gray-300 rounded-lg hover:bg-gray-700">
                            Stock Opname
                        </a>
                    </li>

                </ul>
            </li>


            {{-- SUPPLIER --}}
            <li>
                <a href="{{ route('supplier.index') }}"
                   class="flex items-center p-3 text-white rounded-lg hover:bg-gray-700">

                    <svg class="w-6 h-6 text-gray-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>

                    <span class="ml-3">Supplier</span>
                </a>
            </li>


            {{-- LAPORAN --}}
            <li>
                <button type="button"
                        class="flex items-center w-full p-3 text-white rounded-lg hover:bg-gray-700"
                        data-collapse-toggle="menu-laporan-manager">

                    <svg class="w-6 h-6 text-gray-400"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 17v-2m3 2v-4m3 4v-6M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>

                    <span class="flex-1 ml-3 text-left">Laporan</span>

                    <svg class="w-3 h-3"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 10 6">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <ul id="menu-laporan-manager" class="hidden py-2 space-y-2">

                    <li>
                        <a href="{{ route('laporan.stok') }}"
                           class="flex items-center w-full p-2 pl-11 text-gray-300 rounded-lg hover:bg-gray-700">
                            Laporan Stok
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('laporan.transaksi') }}"
                           class="flex items-center w-full p-2 pl-11 text-gray-300 rounded-lg hover:bg-gray-700">
                            Laporan Transaksi
                        </a>
                    </li>

                </ul>
            </li>

        </ul>

    </div>

</aside>