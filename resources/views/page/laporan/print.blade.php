<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaksi Laundry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <!-- Card Penjualan -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <!-- Header Penjualan -->
                    <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">
                                TRANSAKSI
                            </div>
                        </div>
                    </div>

                    {{-- Form Penjualan --}}
                    <div>
                        <form class="w-full mx-auto" method="POST" action="{{ route('laporan.store') }}">
                            @csrf
                            <div class="flex gap-5">
                                <!-- Input Dari -->
                                <div class="mb-5 w-full">
                                    <label for="dari"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Dari
                                    </label>
                                    <input type="date" id="dari" name="dari"
                                        value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>

                                <!-- Input Sampai -->
                                <div class="mb-5 w-full">
                                    <label for="sampai"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Sampai
                                    </label>
                                    <input type="date" id="sampai" name="sampai"
                                        value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                            </div>
                            <button type="submit"
                            class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-2">
                            Print
                        </button>
                        
                        <button type="submit"
                            class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Batal
                        </button>
                        
                        </form>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
</x-app-layout>