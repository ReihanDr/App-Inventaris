<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $primaryKey = 'idinventaris';
    
    protected $fillable = [
        'nama',
        'kondisi',
        'keterangan',
        'jumlah',
        'idjenis',
        'tanggalregister',
        'idruang',
        'kodeinventaris',
        'idpetugas'
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }  

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'idpetugas');
    }

    public function ruang()
    {
        return $this->belongsTo(ruang::class);
    }  

    // public function peminjaman()
    // {
    //     return $this->belongsTo(peminjaman::class);
    // }  
}