<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lingkungan extends Model
{
    use HasFactory;

    protected $table = 'lingkungan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'alamat',
    ];

}
