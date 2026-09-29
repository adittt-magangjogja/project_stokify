<aside
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform
           -translate-x-full sm:translate-x-0
           bg-gray-800 border-r border-gray-700"
    aria-label="Sidebar">

    <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-800">

        <ul class="space-y-2 font-medium">

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('dashboard.staff') }}"
                   class="flex items-center p-2 text-white rounded-lg
                          hover:bg-gray-700 group">

                    <svg class="w-6 h-6 text-gray-400 group-hover:text-white"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4"/>

                    </svg>

                    <span class="ms-3">
                        Dashboard
                    </span>

                </a>
            </li>


            {{-- Stok --}}
            <li>

                <button type="button"
                        class="flex items-center w-full p-2 text-base text-white
                               rounded-lg hover:bg-gray-700 group"
                        data-collapse-toggle="dropdown-stok-staff"
                        aria-controls="dropdown-stok-staff">

                    <svg class="w-6 h-6 text-gray-400 group-hover:text-white"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>

                    </svg>

                    <span class="flex-1 ms-3 text-left whitespace-nowrap">
                        Stok
                    </span>

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


                <ul id="dropdown-stok-staff"
                    class="hidden py-2 space-y-2">

                    {{-- Konfirmasi Barang Masuk --}}
                    <li>
                        <a href="{{ route('konfirmasi-barang') }}"
                           class="flex items-center w-full p-2 pl-11 text-gray-300
                                  rounded-lg hover:bg-gray-700 hover:text-white">

                            Konfirmasi Barang Masuk

                        </a>
                    </li>


                    {{-- Konfirmasi Barang Keluar --}}
                    <li>
                        <a href="{{ route('konfirmasi-pengeluaran') }}"
                           class="flex items-center w-full p-2 pl-11 text-gray-300
                                  rounded-lg hover:bg-gray-700 hover:text-white">

                            Konfirmasi Barang Keluar

                        </a>
                    </li>

                </ul>

            </li>

        </ul>

    </div>

</aside>