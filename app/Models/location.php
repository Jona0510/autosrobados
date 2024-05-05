<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    
    
    public function autosrobados()
    {
        return $this->belongsToMany(Autosrobado::class);
    }   

    //Buscar la carga ansiosa de la relacion
}

