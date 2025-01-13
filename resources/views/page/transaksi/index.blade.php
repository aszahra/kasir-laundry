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
                                        <th scope="col" class="px-4 py-3">
                                            NO
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            OUTLET
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            KODE INVOICE
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            MEMBER
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            TANGGAL
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            BATAS WAKTU
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            TANGGAL BAYAR
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            BIAYA TAMBAHAN
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            DISKON %
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            PAJAK %
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            STATUS
                                        </th>
                                        <th scope="col" class="px-4 py-3">
                                            DIBAYAR
                                        </th>
                                        @can('role-A')
                                            <th scope="col" class="px-4 py-3">
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
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->id_user->name }}
                                            </td>
                                            <td class="px-6 py-4 bg-gray-100">
                                                {{ $f->total_bayar }}
                                            </td>
                                            @can('role-A')
                                                <td class="px-6 py-4 bg-gray-100">
                                                    <button
                                                        class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                        onclick="return dataDelete('{{ $f->id }}','{{ $f->outlet->nama }}','{{ $f->member->nama }}')">
                                                        <i class="fi fi-sr-delete-document"></i>
                                                    </button>
                                                    <button>
                                                        onclick="return transaksiDelete('{{ $t->id }}','{{ $t->outlet->nama }}')"
                                                        <i class="bi bi-pencil-fill"></i>
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
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full md:w-1/2 relative bg-white rounded-lg shadow mx-5">
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                        Update Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col  p-4 space-y-6">
                        <div class="mb-5">
                            <label for="dibayar"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                Pembayaran</label>
                            <select class="js-example-placeholder-single js-states form-control w-full m-6"
                                id="dibayar" name="dibayar" data-placeholder="Pilih Konsinyasi">
                                <option value="">Pilih...</option>
                                <option value="dibayar">Dibayar</option>
                                <option value="belum dibayar">Belum Dibayar</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="submit" id="formSourceButton"
                            class="bg-green-400 m-2 w-40 h-10 rounded-xl hover:bg-green-500">Simpan</button>
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="bg-red-500 m-2 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- @can('role-A')
        <script>
            const dataDelete = async (id, nama_konsumen) => {
                let tanya = confirm(`Apakah anda yakin untuk menghapus transaksi ${nama_konsumen}?`);
                if (tanya) {
                    try {
                        const response = await axios.post(`/penjualan/${id}`, {
                            '_method': 'DELETE',
                            '_token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        });

                        if (response.status === 200) {
                            alert('Transaksi berhasil dihapus');
                            location.reload();
                        } else {
                            alert('Gagal menghapus transaksi. Silakan coba lagi.');
                        }
                    } catch (error) {
                        console.error(error);
                        alert('Terjadi kesalahan saat menghapus transaksi. Silakan cek konsol untuk detail.');
                    }
                }
            };
        </script> --}}
    {{-- @endcan --}}
</x-app-layout>

<script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const dibayar = button.dataset.dibayar;

        let url = "{{ route('transaksi.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);

        // Set nilai untuk combobox
        const dibayarSelect = document.getElementById('dibayar');
        dibayarSelect.value = dibayar;

        // Jika menggunakan Select2 atau plugin serupa, trigger event change
        $(dibayarSelect).trigger('change');

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);

        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('name', '_token');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    const transaksiDelete = async (id, outlet) => {
        let tanya = confirm(`Apakah anda yakin untuk menghapus transaksi ${outlet}?`);
            if (tanya) {
                try {
                    const response = await axios.post(`/transaksi/${id}`, {
                        '_method': 'DELETE',
                        '_token': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    });

                    if (response.status === 200) {
                        alert('Transaksi berhasil dihapus');
                        location.reload();
                    } else {
                        alert('Gagal menghapus transaksi. Silakan coba lagi.');
                    }
                } catch (error) {
                    console.error(error);
                    alert('Terjadi kesalahan saat menghapus transaksi. Silakan cek konsol untuk detail.');
                }
            }
    }
</script>
