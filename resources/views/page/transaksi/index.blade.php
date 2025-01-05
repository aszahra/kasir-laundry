<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">
                                TRANSAKSI
                            </div>
                            {{-- BUTTON REDIRECT HALAMAN ADD TRANSAKSI --}}
                            <div>
                                <a href="{{ route('transaksi.create') }}"
                                    class="bg-sky-400 p-1 text-white rounded-xl px-4">Tambah</a>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            OUTLET
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            KODE INVOICE
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            MEMBER
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TANGGAL
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            BATAS WAKTU
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            TANGGAL BAYAR
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            BIAYA TAMBAHAN
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            DISKON
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            PAJAK
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            STATUS
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            DIBAYAR
                                        </th>
                                        @can('role-A')
                                            <th scope="col" class="px-6 py-3">
                                                ACTION
                                            </th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $f)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white bg-gray-100">
                                                {{ $no++ }}
                                            </th>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->outlet->nama }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $f->kode_invoice }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->member->nama }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->tanggal }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->batas_waktu }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->tgl_bayar }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->biaya_tambahan }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->diskon }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->pajak }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->status }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->dibayar }}
                                            </td>
                                            @can('role-A')
                                                <td class="px-6 py-4 bg-gray-100">
                                                    <button
                                                        class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                        onclick="return dataDelete('{{ $f->id }}','{{ $f->outlet->nama }}','{{ $f->member->nama }}')">
                                                        <i class="fi fi-sr-delete-document"></i>
                                                    </button>
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
