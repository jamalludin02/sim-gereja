<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umat extends Model
{
    use HasFactory;
    protected $table = 'umat';
    protected $fillable = ['nama_kk','alamat','lingkungan','no_wa']; 

}
