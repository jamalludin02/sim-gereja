<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaptisAnak extends Model
{
    use HasFactory;

    protected $table = 'baptis_anak';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'nama_anak',
        'gender',
        'tgl_lahir',
        'tgl_pelaksanaan',
        'waktu_pelaksanaan',
        'akta_kelahiran',
        'kartu_keluarga',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
