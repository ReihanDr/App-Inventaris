<?php

namespace App\Http\Controllers;

use App\Models\detail_pinjams;
use App\Models\Inventaris;
use App\Models\pegawai;
use App\Models\peminjaman;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = Peminjaman::with('inventaris')->get();$data = DB::table('peminjamen')
        ->join('inventaris','peminjamen.idinventaris','=', 'inventaris.idinventaris')
        ->select('peminjamen.*','inventaris.nama')
        ->get();

        return view("peminjaman.tampil",compact('data',));
    }

    public function pv_index()
    {
        $data = Peminjaman::with('inventaris')->get();$data = DB::table('peminjamen')
        ->join('inventaris','peminjamen.idinventaris','=', 'inventaris.idinventaris')
        ->select('peminjamen.*','inventaris.nama')
        ->get();

        return view("validasipeminjaman.tampil",compact('data',));
    }

    public function pc_index()
    {
        $data = Peminjaman::with('inventaris')->get();$data = DB::table('peminjamen')
        ->join('inventaris','peminjamen.idinventaris','=', 'inventaris.idinventaris')
        ->select('peminjamen.*','inventaris.nama')
        ->get();

        return view("validasipengembalian.tampil",compact('data',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        $inventaris = Inventaris::all();
        return view("peminjaman.input",compact('pegawai','inventaris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idinventaris' => 'required',
            'idpegawai' => 'required',
            'statuspeminjaman' => 'required',  
            'jumlah' => 'required'

        ]);
      
      Peminjaman::create([
        'idinventaris' => $request->idinventaris,
        'idpegawai' => $request->idpegawai,
        'statuspeminjaman' => $request->statuspeminjaman,
        'jumlah' => $request->jumlah
        
      ]);

      return redirect('/peminjaman')->with('succes','peminjaman succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(peminjaman $peminjaman)
    {
        //
    }

    public function allowpeminjaman($id)
    {
        $peminjaman = Peminjaman::find($id);

        if (!$peminjaman){
            return redirect()->back()->with('error','Data peminjaman tidak ditemukan');

        }

        $peminjaman->statuspeminjaman = 'Dipinjam';
        $peminjaman->tanggalpeminjaman = now()->toDateTimeString();
        $peminjaman->save();

        return redirect()->back()->with('success','status peminjaman berhasil diubah menjadi Dipinjam');


    }

       public function  TolakPeminjaman($id)
    {
        $peminjaman = Peminjaman::find($id);

        if (!$peminjaman){
            return redirect()->back()->with('eror','Data pengembalian tidak dapat diproses');
        }

        $peminjaman->statuspeminjaman = 'Ditolak';
        $peminjaman->save();

        return redirect()->back()->with('succes','status proses DiTolak berhasil di lakukan');
    }

    public function allowprosespengembalian($id)
    {
         $peminjaman = Peminjaman::find($id);

         if (!$peminjaman){
            return redirect()->back()->with('eror','Data peminjaman tidak dapat diproses ');
         }

         $peminjaman->statuspeminjaman ='Proses Dikembalikan';
         $peminjaman->tanggalpeminjaman = now()->toDateTimeString();
         $peminjaman->save();

         return redirect()->back()->with('success','status proses pengembalian berhasil di lakukan ');

    }

    public function allowpengembalian($id)
    {
        $peminjaman = Peminjaman::find($id);

        if (!$peminjaman){
            return redirect()->back()->with('eror','Data pengembalian tidak dapat diproses');
        }

        $peminjaman->statuspeminjaman = 'Dikembalikan';
        $peminjaman->tanggalkembali = now()->toDateString();
        $peminjaman->save();

        return redirect()->back()->with('succes','status proses dikembalikan berhasil di lakukan');
    }

 
}
