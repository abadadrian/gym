<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;

    public function activity()
    { // el nombre es significativo
        return $this->belongsTo(Activity::class);
    }

    //Relacion N:N - Entre Usuarios y Sesions
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
