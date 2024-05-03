<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autosrobado extends Model
{
    use HasFactory;

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

    public function locations()
    {
        return $this->belongsToMany(location::class);
    }

    public function archivos()
    {
        return $this->hasMany(archivo::class);
    }   
}
