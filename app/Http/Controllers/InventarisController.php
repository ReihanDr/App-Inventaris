<?php

namespace App\Http\Controllers;

use App\Models\inventaris;
use Illuminate\Http\Request;
use App\Models\Jenis;
use App\Models\Ruang;
use App\Models\Petugas;
use Illuminate\Support\Facades\DB;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $judul = "Inventaris";

        $data = Inventaris::with('petugas')->get();$data = DB::table('inventaris')
        ->join('petugas','inventaris.idpetugas','=', 'petugas.idpetugas')
        ->select('inventaris.*','petugas.namapetugas')
        ->get();

        return view('inventaris.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $petugas = Petugas::all();
        $ruang = Ruang::all();
        $jenis = jenis::all();
        return view('inventaris.input', compact('petugas','ruang','jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required|numeric',
            'idjenis' => 'required',
            'tanggalregister' => 'required|date',
            'idruang' => 'required',
            'kodeinventaris' =>'required',
            'idpetugas' => 'required',
        ]);

        // Insert the record into the database
    Inventaris::create([
        'nama' => $request->nama,
        'kondisi' => $request->kondisi,
        'keterangan' => $request->keterangan,
        'jumlah' => $request->jumlah,
        'idjenis' => $request->idjenis,
        'tanggalregister' => $request->tanggalregister,
        'idruang' => $request->idruang,
        'kodeinventaris' => $request->kodeinventaris,
        'idpetugas' => $request->idpetugas
    ]);


        return redirect('/inventaris')->with('succes', 'inventaris created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(inventaris $inventaris)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inventaris = inventaris::find($id);
        $jenis = jenis::all();
        $ruang = Ruang::all();
        $petugas = Petugas::all();

        if(!$inventaris) {
            return redirect()->back()->with('error', 'Inventaris not found.');
        }

        return view("inventaris.edit", compact('inventaris', 'jenis', 'ruang', 'petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, inventaris $inventaris)
    {
        DB::table('inventaris')->where('idinventaris',$request->idinventaris)->update([
            'nama' => $request->nama,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'idjenis' => $request->idjenis,
            'tanggalregister' => $request->tanggalregister,
            'idruang' => $request->idruang,
            'kodeinventaris' => $request->kodeinventaris,
            'idpetugas' => $request->idpetugas
        ]);

        return redirect('/inventaris');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('inventaris')->where('idinventaris',$id)->delete();

        return redirect('/inventaris');

    }
}
