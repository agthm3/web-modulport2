<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getByKode($kode)
    {
        $barang = Barang::where('kode_barang', $kode)->first();
        if (!$barang) {
            return response()->json(['message' => 'Barang tidak ditemukan'], 404);
        }
        return response()->json($barang);
    }

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

    public function import(Request $request)
    {
        $file = $request->file('file');
        if ($file->isValid()) {
            $csvData = file_get_contents($file->getRealPath());
            $rows = array_map(function ($item) { return str_getcsv($item, ';'); }, explode("\n", $csvData));
            $header = array_shift($rows);  // Remove and use the first row as header
    
            foreach ($rows as $row) {
                if (count($row) === count($header)) {
                    $data = array_combine($header, $row);
                    $validator = Validator::make($data, [
                        'Kode Barang' => 'required|max:255',
                        'Nama Barang' => 'required|max:255|string',
                        'Satuan' => 'required|max:255',
                        'Qty' => 'required|numeric',
                        'Harga' => 'required|numeric'
                    ]);
    
                    if ($validator->fails()) {
                        // You can collect all errors or stop at the first one
                        Log::error('Validation error: ', $validator->errors()->toArray());
                        continue;  // Skip the erroneous data row or return an error message
                    }
    
                    Barang::create([
                        'kode_barang' => $data['Kode Barang'],
                        'nama_barang' => $data['Nama Barang'],
                        'satuan' => $data['Satuan'],
                        'qty' => $data['Qty'],
                        'harga' => $data['Harga']
                    ]);
                }
            }
            return redirect()->route('barang.index')->with('success', 'Data barang berhasil diimpor.');
        }
        return back()->withErrors('Invalid file uploaded.');
    }

}
