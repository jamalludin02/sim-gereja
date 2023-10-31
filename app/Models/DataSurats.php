<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSurats extends Model
{
    use HasFactory;
    protected $table = 'datasurat';
    protected $fillable = ['user_id','ibadah_id','pendeta_id','surat_link']; 
}
