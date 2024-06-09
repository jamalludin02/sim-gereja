<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidi extends Model
{
    use HasFactory;

    protected $table = 'sidi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'surat_baptis',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
