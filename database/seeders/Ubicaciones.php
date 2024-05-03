<?php

namespace Database\Seeders;

use App\Models\location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Ubicaciones extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
        

        $ubicacion = new location();
        $ubicacion->Ubicaciones = 'Guadalajara';
        $ubicacion->save();
        $ubicacion = new location();
        $ubicacion->Ubicaciones = 'Tlaquepaque';
        $ubicacion->save();
        $ubicacion = new location();
        $ubicacion->Ubicaciones = 'Tlajomulco';
        $ubicacion->save();
        $ubicacion = new location();
        $ubicacion->Ubicaciones = 'Zapopan';
        $ubicacion->save();
        $ubicacion = new location();
        $ubicacion->Ubicaciones = 'Tonala';
        $ubicacion->save();
        $ubicacion = new location();
        $ubicacion->Ubicaciones = 'El Salto';
        $ubicacion->save();
        $ubicacion = new location();
        $ubicacion->Ubicaciones = 'Zapotlanejo';
        $ubicacion->save();
        $ubicacion = new location();
        $ubicacion->Ubicaciones = 'Chapala';
        $ubicacion->save();

        
    }
}
