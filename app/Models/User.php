<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'gender',
        'id_lingkungan', 
        'role',
    ];

    protected $hidden = [
        'password',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function lingkungan()
    {
        // return $this->belongsTo(Lingkungan::class, 'id_lingkungan');
        return $this->hasOne(Lingkungan::class, 'id', 'id_lingkungan');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = $model->getAndCheckId();
        });
    }

    public function getAndCheckId()
    {
        $id = Str::random(10);
        if (self::where('id', $id)->exists()) {
            return $this->getAndCheckId();
        } else {
            return $id;
        }
    }
}
