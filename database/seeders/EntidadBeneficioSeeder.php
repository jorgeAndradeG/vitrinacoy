<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entidad_beneficio;

class EntidadBeneficioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidades = [
            ['nombre' => 'Fosis', 'estado' => 1],
            ['nombre' => 'Corfo', 'estado' => 1],
            ['nombre' => 'Sercotec', 'estado' => 1]
        ];
        foreach($entidades as $entidad){
            Entidad_beneficio::create($entidad);
        }
    }
}
