<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumumans extends Model
{
    use HasFactory;
    protected $table = 'pengumuman';
    protected $fillable = ['judul','isi']; 
}
