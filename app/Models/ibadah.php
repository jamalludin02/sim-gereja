<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ibadah extends Model
{
    use HasFactory;
    protected $table = 'ibadah';
    protected $primarykey = 'id';
    protected $fillable = ['nama_kk','alamat','lingkungan','tanggal','jam','pendeta','pendeta_id','user_id','status']; 
}
