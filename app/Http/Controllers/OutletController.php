<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $outlet = Outlet::paginate(5);
        // return view('page.outlet.index')->with([
        //     'outlet' => $outlet,
        // ]);

        //API//

        $outlet = Outlet::all();
        return response()->json([
            'outlet' => $outlet,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = [
        //     'nama' => $request->input('nama'),
        //     'alamat' => $request->input('alamat'),
        // ];

        // Outlet::create($data);

        // return back()->with('message_delete', 'Data Outlet Sudah dihapus');

        //API
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        Outlet::create($validatedData);

        return response()->json([
            'message_update' => "Data Added!"
        ]);
    }

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
        // $data = [
        //     'nama' => $request->input('nama'),
        //     'alamat' => $request->input('alamat'),
        // ];

        // $datas = Outlet::findOrFail($id);
        // $datas->update($data);

        // return back()->with('message_delete', 'Data Outlet Sudah di hapus');

        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
        ];

        $datas = Outlet::findOrFail($id);
        $datas->update($data);

        return response()->json([
            'message_update' => "Data Updated!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $data = Outlet::findOrFail($id);
        // $data->delete();
        // return back()->with('message_delete', 'Data Outlet Sudah dihapus');

        try {
            // Cari data berdasarkan ID
            $data = Outlet::findOrFail($id);
    
            // Hapus data
            $data->delete();
    
            // Kembalikan respons JSON berhasil
            return response()->json([
                'success' => true,
                'message' => 'Data Outlet berhasil dihapus.'
            ], 200); // Status 200 untuk permintaan berhasil
        } catch (\Exception $e) {
            // Tangani error jika ada
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data: ' . $e->getMessage()
            ], 500); // Status 500 untuk error server
        }
    }
}
