<!-- /Pegawai.php/ -->

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'email',
        'tanggal_lahir',
        'unit_id',
    ];

    // Relasi dengan model Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
