<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Ranting;
use App\Models\DataPersonal;
use App\Models\PendidikanFormal;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'ranting_id',
        'no_kta',
        'jenis_kelamin',
        'foto',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Relasi
    public function ranting()
    {
        return $this->belongsTo(Ranting::class);
    }

    public function dataPersonal()
    {
        return $this->hasOne(DataPersonal::class);
    }

    public function pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class);
    }

    public function perizinan()
    {
        return $this->hasOne(Perizinan::class);
    }

    public function kependudukan()
    {
        return $this->hasOne(Kependudukan::class);
    }

    public function pendidikanFormals()
    {
        return $this->hasMany(PendidikanFormal::class);
    }

    public function pendidikanProfesis()
    {
        return $this->hasMany(PendidikanProfesi::class);
    }

    public function pelatihans()
    {
        return $this->hasMany(Pelatihan::class);
    }
}
