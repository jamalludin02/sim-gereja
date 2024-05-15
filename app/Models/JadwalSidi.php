<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSidi extends Model
{
    use HasFactory;
    protected $table = 'jadwal_sidi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'tanggal',
        'waktu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
