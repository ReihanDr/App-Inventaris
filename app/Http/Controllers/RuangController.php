<?php

namespace App\Http\Controllers;

use App\Models\ruang;
use Illuminate\Http\Request;
use Illuminate\Support\facades\db;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = " Data Ruang";

        $data = Ruang::all();

        return view("ruang.tampil",compact('data','judul'));
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $judul = "Ruang";
        return view('ruang.input', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('ruangs')->insert([

            'namaruang'=>  $request->namaruang,
            'koderuang'=> $request->koderuang,
            'keterangan'=> $request->keterangan
       ]);

       return redirect('/ruang');
    }

    /**
     * Display the specified resource.
     */
    public function show(ruang $ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
          // mengambil data pegawai berdasarkan id yang dipilih
          $idruang = DB::table('ruangs')->where('idruang',$id)->get();
          // passing data pegawai yang didapat ke view edit.blade.php
          return view('ruang.edit',['ruang' => $idruang]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ruang $ruang)
    {
        DB::table('ruangs')->where('idruang',$request->id)->update([
            'namaruang' => $request->namaruang,
            'koderuang' => $request->koderuang,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/ruang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('ruangs')->where('idruang',$id)->delete();

        return redirect('/ruang');
    }
}
