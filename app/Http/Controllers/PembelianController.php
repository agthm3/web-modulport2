<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPembelian = Pembelian::all();
        return view('master-pembelian.index', compact('allPembelian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-pembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // simpan setiap baris item ke dalam database
        foreach ($request->items as $item) {
            $pembelian = new Pembelian();
            $pembelian->nomor_pembelian = $request->nomor_pembelian;
            $pembelian->tanggal = $request->tanggal;
            $pembelian->kode_barang = $item['kode_barang'];
            $pembelian->qty = $item['qty'];
            $pembelian->satuan = $item['satuan'];
            $pembelian->harga = $item['harga']; // Pastikan format harga sesuai ketika disimpan
            $pembelian->diskon = $item['diskon'];
            $pembelian->subtotal = $item['subtotal']; // Mungkin perlu dihitung ulang di server side
            $pembelian->save();
    
            // update stok barang
            $barang = Barang::where('kode_barang', $item['kode_barang'])->first();
            if ($barang) {
                $barang->qty -= $item['qty'];
                $barang->save();
            }
        }
    
        return redirect()->route('pembelian.index')->with('success', 'Pembelian berhasil disimpan');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
