<?php

namespace App\Http\Controllers;

use App\Models\jenis;
use Illuminate\Http\Request;
use Illuminate\Support\facades\db;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = " Jenis";

        $data = Jenis::all();

        return view("jenis.tampil",compact('data','judul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $judul = "Jenis";
        return view('jenis.input', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('jenis')->insert([

            'namajenis'=>  $request->namajenis,
            'kodejenis'=> $request->kodejenis,
            'keterangan'=> $request->keterangan
       ]);

       return redirect('/jenis');
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
          // mengambil data pegawai berdasarkan id yang dipilih
          $idjenis = DB::table('jenis')->where('idjenis',$id)->get();
          // passing data pegawai yang didapat ke view edit.blade.php
          return view('jenis.edit',['jenis' => $idjenis]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jenis $jenis)
    {
        DB::table('jenis')->where('idjenis',$request->id)->update([
            'namajenis' => $request->namajenis,
            'kodejenis' => $request->kodejenis,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/jenis');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        DB::table('jenis')->where('idjenis',$id)->delete();

        return redirect('/jenis');
    }
}
