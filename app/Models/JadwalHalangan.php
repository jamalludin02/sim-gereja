<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalHalangan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_halangan';
    protected $fillable = [
        'id_pendeta',
        'tanggal',
        'waktu',
        'keterangan',
        'status',
    ];
    public function pendeta()
    {
        return $this->belongsTo(User::class, 'id_pendeta');
    }

}
