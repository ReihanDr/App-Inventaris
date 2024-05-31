<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;

    protected $primaryKey = 'idpeminjaman';

    protected $fillable = [
        'idinventaris',
        'idpegawai',
        'tanggalpeminjaman',
        'tanggalkembali',
        'statuspeminjaman',
        'jumlah'
    ];

    public function inventaris()
    {
        return $this->belongsTo(Inventaris::class);
    }  

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    }
