<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'activity_minutes', 'max_participants'];

    //el método users nos devolverá una colección de usuarios
    public function sesions()
    {
        //el nombre es significativo
        return $this->hasMany(Sesion::class);
    }
}
