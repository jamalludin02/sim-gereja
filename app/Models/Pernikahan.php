<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pernikahan extends Model
{
    use HasFactory;

    protected $table = 'pernikahan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user_laki',
        'id_user_perempuan',
        'tanggal',
        'waktu',
        'ktp_laki',
        'ktp_perempuan',
        'sidi_laki',
        'sidi_perempuan',
        'id_pendeta',
        'status',
    ];

   

    public function userLaki()
    {
        return $this->hasOne(User::class, 'id', 'id_user_laki');
    }

    public function userPerempuan()
    {
        return $this->hasOne(User::class, 'id', 'id_user_perempuan');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id_user_laki');
    }


    public function sidiLaki()
    {
        return $this->belongsTo(Sidi::class, 'sidi_laki');
    }

    public function sidiPerempuan()
    {
        return $this->belongsTo(Sidi::class, 'sidi_perempuan');
    }

    public function pendeta()
    {
        return $this->belongsTo(User::class, 'id_pendeta')->where('role', 'PENDETA');
    }

}
