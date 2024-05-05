<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class archivo extends Model
{
    use HasFactory;

    public function autosrobado()
    {
        return $this->belongsTo(Autosrobado::class);
    }

    //Buscar la carga ansiosa de la relacion
}

