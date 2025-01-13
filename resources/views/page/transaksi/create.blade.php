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
                    <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                        <div class="flex items-center justify-between">
                            <div class="w-full">
                                FORM INPUT TRANSAKSI
                            </div>
                        </div>
                    </div>
                    {{-- FORM INPUT PENJUALAN --}}
                    <div>
                        <form class="w-full mx-auto" method="POST" action="{{ route('transaksi.store') }}">
                            @csrf
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="id_outlet"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Outlet</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="id_outlet" id="id_outlet" data-placeholder="Pilih Outlet">
                                        <option value="" disabled selected>Pilih...</option>
                                        @foreach ($outlet as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="kode_invoice"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                        Invoice</label>
                                    <input type="text" id="kode_invoice" name="kode_invoice"
                                        value="{{ $kode_invoice }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Kode Penjualan" readonly required />
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="id_member"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Member</label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="id_member" id="id_member" data-placeholder="Pilih Member">
                                        <option value="" disabled selected>Pilih...</option>
                                        @foreach ($member as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                    </label>
                                    <select class="js-example-placeholder-single js-states form-control w-full"
                                        name="status" id="status" data-placeholder="Pilih Status">
                                        <option value="" disabled selected>Pilih...</option>
                                        <option value="BARU">BARU</option>
                                        <option value="PROSES">PROSES</option>
                                        <option value="SELESAI">SELESAI</option>
                                        <option value="DIAMBIL">DIAMBIL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="batas_waktu"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batas Waktu
                                    </label>
                                    <input type="date" id="batas_waktu" name="batas_waktu"
                                        value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="tanggal"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    </label>
                                    <input type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                {{-- <div class="mb-5 w-full">
                                    <label for="tgl_bayar"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                        Bayar
                                    </label>
                                    <input type="date" id="tgl_bayar" name="tgl_bayar" value="{{ date('Y-m-d') }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div> --}}
                            </div>

                            {{-- DETAIL TRANSAKSI --}}
                            <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                                <div class="flex items-center justify-between">
                                    <div class="w-full">
                                        DETAIL PRODUK PENJUALAN
                                    </div>
                                    <div><button id="addRowBtn"
                                            class="bg-sky-400 hover:bg-sky-500 text-white px-2 rounded-xl">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="border border-2 rounded-xl p-2 mb-2" id="produkContainer">
                                </div>
                            </div>
                            {{-- ======================= --}}
                            <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="biaya_tambahan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                        Tambahan
                                    </label>
                                    <input type="number" id="biaya_tambahan" name="biaya_tambahan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="diskon"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon
                                    </label>
                                    <input type="number" id="diskon" name="diskon"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="pajak"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pajak
                                    </label>
                                    <input type="number" id="pajak" name="pajak"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required />
                                </div>
                            </div>
                            <div class="gap-5 flex">
                                <div class="mb-5 w-full">
                                    <label for="total_jual"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total</label>
                                    <input type="number" id="total_jual" name="total_jual" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                                <div class="mb-5 w-full">
                                    <label for="total_bayar"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                        Bayar</label>
                                    <input type="number" id="total_bayar" name="total_bayar"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                </div>
                            </div>
                            {{-- <div class="flex gap-5">
                                <div class="mb-5 w-full">
                                    <label for="id_user"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        User
                                    </label>
                                    @foreach ($user as $k)
                                        <option value="{{ $k->id }}">{{ $k->name }}</option>
                                    @endforeach
                                </div>
                            </div> --}}
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                    {{-- =================== --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            function calculateTotalBayar() {
                const totalHarga = parseFloat($('#total_jual').val()) || 0;
                const biayaTambahan = parseFloat($('#biaya_tambahan').val()) || 0;
                const diskon = parseFloat($('#diskon').val()) || 0;
                const pajak = parseFloat($('#pajak').val()) || 0;
                const totalBayar = totalHarga - (totalHarga * (diskon/100)) + biayaTambahan + pajak;
                $('#total_bayar').val(totalBayar);
            }

            // Event listener untuk total_bayar
            $('#biaya_tambahan').on('input', function() {
                calculateTotalBayar();
            });

            $('#diskon').on('input', function() {
                calculateTotalBayar();
            });

            // MENAMBAH ROW DETAIL PRODUK PENJUALAN
            $('#addRowBtn').click(function(event) {
                event.preventDefault();
                addRow();
            });

            let rowCount = 0;

            function addRow() {
                rowCount++;
                const newRow = `<div class="border border-2 rounded-xl mb-2 p-2" id="row${rowCount}">
                                <div class="flex mb-2 gap-2">
                                    <div class="mb-5 w-full">
                                        <label for="paket${rowCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paket</label>
                                        <select id="paket${rowCount}" name="paket[]" class="form-control w-full"
                                            onchange="getPaket(${rowCount})">
                                            <option value="">Pilih...</option>
                                            @foreach ($paket as $k)
                                                <option value="{{ $k->id }}">{{ $k->nama_paket }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="harga${rowCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                                        <input type="number" id="harga${rowCount}" name="harga[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly />
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="qty${rowCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qty</label>
                                        <input type="number" id="qty${rowCount}" name="qty[]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required value="0"/>
                                    </div>
                                    <div class="mb-5 w-full">
                                        <label for="total_harga${rowCount}"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Harga</label>
                                        <input type="number" id="total_harga${rowCount}" name="total_harga[]"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required readonly/>
                                    </div>
                                    <button type="button" class="px-2 bg-red-100" onclick="removeRow(${rowCount})">
                                        Hapus
                                    </button>
                                </div>
                            </div>`;
                $('#produkContainer').append(newRow);
                $(`#produk${rowCount}`).select2({
                    placeholder: "Pilih Paket"
                });

                // tambahin ini
                bindRowEvents(rowCount);
            }

            function bindRowEvents(rowId) {
                const hargaInput = document.getElementById(`harga${rowId}`);
                const qtyInput = document.getElementById(`qty${rowId}`);
                const totalHargaInput = document.getElementById(`total_harga${rowId}`);

                // Perhitungan total harga
                const calculateTotalHarga = () => {
                    const harga = parseFloat(hargaInput.value) || 0;
                    const qty = parseInt(qtyInput.value) || 0;
                    totalHargaInput.value = harga * qty;

                    //MENGHITUNG TOTAL JUAL
                    calculateTotalJual();
                };
                qtyInput.addEventListener("input", calculateTotalHarga);
            }

            //PERHITUNGAN TOTAL JUAL
            function calculateTotalJual() {
                let totalJual = 0;
                let pajak = 0;
                $("[id^='total_harga']").each(function() {
                    totalJual += parseFloat($(this).val()) || 0;
                    pajak = totalJual * (12 / 100);
                });
                $('#total_jual').val(totalJual);
                $('#pajak').val(pajak);
            }
        });

        // MENGHAPUS ROW DETAIL PRODUK PENJUALAN
        function removeRow(rowId) {
            $(`#row${rowId}`).remove();
            updateRowNumbers();
        }
    </script>

<script>
    const getPaket = (rowCount) => {
        const paketId = document.getElementById(`paket${rowCount}`).value;

        if (!paketId) {
            document.getElementById(`harga${rowCount}`).value = "";
            return;
        }

        axios.get(`/paket/nama_paket/${paketId}`)
            .then(response => {
                const paket = response.data.paket;

                document.getElementById(`harga${rowCount}`).value = paket ? paket.harga : "";
            })
            .catch(error => {
                console.error("Gagal memuat data paket:", error);
                document.getElementById(`harga${rowCount}`).value = "";
            });
    };
</script>
</x-app-layout>
