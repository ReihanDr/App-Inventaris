<?php
namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\facades\db;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judul = " Data Pegawai";

        $data = Pegawai::all();

        return view("pegawai.tampil",compact('data','judul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $judul = "Pegawai";
        return view('Pegawai.input', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('pegawais')->insert([

            'namapegawai'=>  $request->namapegawai,
            'nip'=> $request->nip,
            'alamat'=> $request->alamat
       ]);

       return redirect('/pegawai');
    }

    /**
     * Display the specified resource.
     */
    public function show(pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         // mengambil data pegawai berdasarkan id yang dipilih
         $idpegawai = DB::table('pegawais')->where('idpegawai',$id)->get();
         // passing data pegawai yang didapat ke view edit.blade.php
         return view('pegawai.edit',['pegawais' => $idpegawai]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, pegawai $pegawai)
    {
        DB::table('pegawais')->where('idpegawai',$request->id)->update([
            'namapegawai' => $request->namapegawai,
            'nip' => $request->nip,
            'alamat' => $request->alamat,
        ]);

        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('pegawais')->where('idpegawai',$id)->delete();

        return redirect('/pegawai');
    }
}
