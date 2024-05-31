<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\ValidasiPeminjamanController;
use App\Models\jenis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BerandaController::class,'index']);

// Petugas
Route::get('/petugas', [PetugasController::class,'index']);
Route::get('/petugas/create', [PetugasController::class,'create']);
Route::post('/petugas/store', [PetugasController::class,'store']);
// Edit Petugas
Route::get('/petugas/edit/{idpetugas}', [PetugasController::class,'edit']);
Route::post('/petugas/update', [PetugasController::class,'update']);
Route::get('/petugas/hapus/{idpetugas}', [PetugasController::class,'destroy']);
// Pegawai
Route::get('/pegawai', [PegawaiController::class,'index']);
Route::get('/pegawai/create', [PegawaiController::class,'create']);
Route::post('/pegawai/store', [PegawaiController::class,'store']);
// Edit Pegawai
Route::get('/pegawai/edit/{editpegawai}',[PegawaiController::class,'edit']);
Route::post('/pegawai/update', [PegawaiController::class,'update']);
Route::get('/pegawai/hapus/{idpegawai}',[PegawaiController::class,'destroy']);
// Jenis
Route::get('/jenis', [JenisController::class,'index']);
Route::get('/jenis/create', [JenisController::class,'create']);
Route::post('/jenis/store', [JenisController::class,'store']);
// Edit Jenis
Route::get('/jenis/edit/{idjenis}', [JenisController::class,'edit']);
Route::post('/jenis/update',[JenisController::class,'update']);
Route::get('/jenis/hapus/{idjenis}',[JenisController::class,'destroy']);
// Ruang
Route::get('/ruang',[RuangController::class,'index']);
Route::get('/ruang/create',[RuangController::class,'create']);
Route::post('/ruang/store',[RuangController::class,'store']);
// Edit Ruang
Route::get('/ruang/edit/{idruang}',[RuangController::class,'edit']);
Route::post('/ruang/update',[RuangController::class,'update']);
Route::get('/ruang/hapus/{idruang}',[RuangController::class,'destroy']);
// Inventaris
Route::get('/inventaris',[InventarisController::class,'index']);
Route::get('/inventaris/create',[InventarisController::class,'create']);
Route::post('/inventaris/store',[InventarisController::class,'store']);
// Edit Inventaris
Route::get('/inventaris/edit/{idinventaris}',[InventarisController::class,'edit']);
Route::post('/inventaris/update',[InventarisController::class,'update']);
Route::get('/inventaris/hapus/{idinventaris}',[InventarisController::class,'destroy']);
//  Peminjaman
Route::get('/peminjaman',[PeminjamanController::class,'index']);
Route::get('/peminjaman/create',[PeminjamanController::class,'create']);
Route::post('/peminjaman/store',[PeminjamanController::class,'store']);
// Validasi Peminjaman & pengembalian
Route::get('/validasipeminjaman',[PeminjamanController::class,'pv_index']);
Route::get('/validasipeminjaman/allow/{idpeminjaman}',[PeminjamanController::class,'allowpeminjaman']);
Route::get('/validasipengembalian',[PeminjamanController::class,'pc_index']);
Route::get('/validasipengembalian/allow/{idppeminjaman}',[PeminjamanController::class,'allowpengembalian']);
Route::get('/validasipengembalian/prosespengembalian/{idpeminjaman}',[PeminjamanController::class,'allowprosespengembalian']);
Route::get('/tolak/peminjaman/{idpeminjaman}', [PeminjamanController::class, 'TolakPeminjaman']);

//Login
// Route::post('/postlogin','LoginController@postlogin')->name('postlogin');

Route::get('/login', function (){
    return view('Pengguna.login');
});
