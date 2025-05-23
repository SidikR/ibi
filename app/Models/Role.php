<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * Relasi ke model User (1 Role memiliki banyak User)
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
