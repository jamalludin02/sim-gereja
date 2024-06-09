<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbadahSyukur extends Model
{
    use HasFactory;

    protected $table = 'ibadah_syukur';
    protected $fillable = [
        'id_user',
        'tanggal',
        'waktu',
        'keterangan',
        'status',
        'id_pendeta',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function pendeta()
    {
        return $this->belongsTo(User::class, 'id_pendeta')->where('role', 'PENDETA');
    }

}
