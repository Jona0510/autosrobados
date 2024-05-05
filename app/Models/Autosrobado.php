<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autosrobado extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'marca',
        'modelo', 
        'fecha_robo',
        'estatus',
        'correo',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //Buscar la carga ansiosa de la relacion

    public function locations()
    {
        return $this->belongsToMany(location::class);
    }
    //Buscar la carga ansiosa de la relacion

    public function archivos()
    {
        return $this->hasMany(archivo::class);
    }   
    
    //Buscar la carga ansiosa de la relacion
}
