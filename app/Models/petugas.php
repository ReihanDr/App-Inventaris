<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
  
  use HasFactory;

  protected $primaryKey = 'idpetugas';
  
  protected $fillable = [
      'namapetugas',
  ];

  public function inventaris()
  {
    return $this->hasMany(Inventaris::class,'idpetugas');
  }  

  public function level()
  {
    return $this->belongsTo(Level::class);
  }  

}
