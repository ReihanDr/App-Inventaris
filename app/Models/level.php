<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_level';

    protected $fillable = [
        'nama_level'
    ];

}
