<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::paginate(5);
        return view('page.transaksi.index')->with([
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $outlet = Outlet::all();
        $member = Member::all();
        $paket = Paket::all();
        $kode_invoice = Transaksi::createCode();
        return view('page.transaksi.create', compact('kode_invoice'))->with([
            'outlet' => $outlet,
            'member' => $member,
            'paket' => $paket,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'kode_invoice' => 'required|string',
        //     'id_paket' => 'required|array',
        //     'qty' => 'required|array',
        //     'keterangan' => 'nullable|array',
        // ]);

        $kode_invoice = $request->input('kode_invoice');
        // $paket = $request->input('id_paket', []);
        // $qty = $request->input('qty', []);
        // $keterangan = $request->input('keterangan', []);

        // foreach ($paket as $index => $id_paket) {
        //     $dataDetail = [
        //         'kode_invoice' => $kode_invoice,
        //         'id_paket' => $id_paket,
        //         'qty' => $qty[$index] ?? 1,
        //         'keterangan' => $keterangan[$index] ?? '',
        //     ];
        //     DetailTransaksi::create($dataDetail);
        // }

        $datas = [
            'kode_invoice' => $kode_invoice,
            'id_paket' => $k,
            'qty' => $request->input('qty'),
        ];
        DetailTransaksi::create($datas);

        $data = [
            'kode_invoice' => $kode_invoice,
            'id_outlet' => $request->input('id_outlet'),
            'id_member' => $request->input('id_member'),
            'tanggal' => $request->input('tanggal'),
            'batas_waktu' => $request->input('batas_waktu'),
            'tgl_bayar' => $request->input('tgl_bayar'),
            'biaya_tambahan' => $request->input('biaya_tambahan'),
            'diskon' => $request->input('diskon'),
            'pajak' => $request->input('pajak'),
            'status' => $request->input('status'),
            'dibayar' => $request->input('dibayar'),
            'total' => $request->input('total'),
            'id_user' => Auth::user()->id,
        ];

        Transaksi::create($data);

        // Transaksi::create([
        //     'kode_invoice' => $kode_invoice,
        //     'id_outlet' => $request->input('id_outlet'),
        //     'id_member' => $request->input('id_member'),
        //     'tanggal' => $request->input('tanggal'),
        //     'batas_waktu' => $request->input('batas_waktu'),
        //     'tgl_bayar' => $request->input('tgl_bayar'),
        //     'biaya_tambahan' => $request->input('biaya_tambahan'),
        //     'diskon' => $request->input('diskon'),
        //     'pajak' => $request->input('pajak'),
        //     'status' => $request->input('status'),
        //     'dibayar' => $request->input('dibayar'),
        //     'total' => $request->input('total'),
        //     'id_user' => Auth::user()->id,
        // ]);

        return redirect()
            ->route('transaksi.index')
            ->with('message', 'Data sudah ditambahkan');
    }

    // public function store(Request $request)
    // {
    //     $kode_invoice = $request->input('kode_invoice');

    //     $paket = $request->input('id_paket', []);
    //     $dataDetail = [
    //         'kode_invoice' => $kode_invoice,
    //         'id_paket' => $request->input('id_paket'),
    //         'qty' => $request->input('qty'),
    //         'keterangan' => $request->input('keterangan'),
    //     ];
    //     DetailTransaksi::create($dataDetail);

    //     // if($request->input('total_bayar') < $request->input('total_jual')){
    //     //     $statusPembelian = 'PIUTANG';
    //     // }else{
    //     //     $statusPembelian = 'LUNAS';
    //     // }

    //     $data = [
    //         'kode_invoice' => $kode_invoice,
    //         'id_outlet' => $request->input('id_outlet'),
    //         'id_member' => $request->input('id_member'),
    //         'tanggal' => $request->input('tanggal'),
    //         'batas_waktu' => $request->input('batas_waktu'),
    //         'tgl_bayar' => $request->input('tgl_bayar'),
    //         'biaya_tambahan' => $request->input('biaya_tambahan'),
    //         'diskon' => $request->input('diskon'),
    //         'pajak' => $request->input('pajak'),
    //         'status' => $request->input('status'),
    //         'dibayar' => $request->input('dibayar'),
    //         'total' => $request->input('total'),
    //         'id_user' => Auth::user()->id,
    //     ];

    //     Transaksi::create($data);

    //     return redirect()
    //         ->route('transaksi.index')
    //         ->with('message', 'Data sudah ditambahkan');
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 
    }
}
