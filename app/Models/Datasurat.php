<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasurat extends Model
{
    use HasFactory;

    protected $table = 'data_surat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'id_ibadah',
        'id_pendeta',
        'surat_link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ibadah()
    {
        return $this->belongsTo(IbadahSyukur::class, 'id_ibadah');
    }

    public function pendeta()
    {
        return $this->belongsTo(User::class, 'id_pendeta');
    }
}
