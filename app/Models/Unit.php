<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
    ];

    // Relasi dengan model Pegawai
    // public function pegawais()
    // {
    //     return $this->hasMany(Pegawai::class);
    // }
}
