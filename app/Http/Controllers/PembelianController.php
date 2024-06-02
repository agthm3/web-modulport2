<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    public function rekap(Request $request)
    {
        Log::info('Received start date: ' . $request->start_date);
        Log::info('Received end date: ' . $request->end_date);
    
        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();
    
        Log::info('Processed start date: ' . $startDate);
        Log::info('Processed end date: ' . $endDate);
    
        $purchases = Pembelian::where('tanggal', '>=', $startDate)
                              ->where('tanggal', '<=', $endDate)
                              ->get();
    
        Log::info('Number of purchases retrieved: ' . $purchases->count());
    
        return view('master-pembelian.final', compact('purchases'));
    }
    
    
    public function download(Request $request)
    {
        // Menggunakan Carbon untuk memastikan format tanggal
        $startDate = Carbon::parse($request->start_date)->startOfDay(); // Mengatur ke awal hari
        $endDate = Carbon::parse($request->end_date)->endOfDay(); // Mengatur ke akhir hari
    
        $purchases = Pembelian::where('tanggal', '>=', $startDate)
                    ->where('tanggal', '<=', $endDate)
                    ->get();
    
        // Pastikan menggunakan Facade untuk PDF::loadView
        $pdf = FacadePdf::loadView('master-pembelian.final', compact('purchases'));
        return $pdf->download('rekap-pembelian.pdf');
    }

}
