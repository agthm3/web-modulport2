<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allBarang= Barang::all();
        return view('master-barang.index', compact('allBarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang'=> 'required|max:255',
            'nama_barang'=> 'required|max:255|string',
            'satuan'=> 'required|max:255',
            'qty'=> 'required|numeric',
            'harga'=> 'required|numeric'
        ]);

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'qty' => $request->qty,
            'harga' => $request->harga,
        ]);

        return Redirect::route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return Redirect::back();
    }
}
