<?php

namespace Database\Seeders;
use App\Models\Rubro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RubroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $rubro = [
            ['nombre' => 'Comida', 'Descripcion' => 'Emprendimientos de comida.', 'estado' => '1'],
            ['nombre' => 'Tecnología', 'Descripcion' => 'Emprendimientos de artículos tecnológicos, manteción, negocios digitales, etc.', 'estado' => '1'],
            ['nombre' => 'Belleza', 'Descripcion' => 'Barberías, peluquerías, salones de belleza, etc.', 'estado' => '1'],
            ['nombre' => 'Cosmética', 'Descripcion' => 'Productos para el cuidado personal.', 'estado' => '1'],
            ['nombre' => 'Turismo', 'Descripcion' => 'Alojamientos, tours, etc.', 'estado' => '1'],
            ['nombre' => 'Ropa', 'Descripcion' => 'Emprendimientos relacionados a ropa de primera o segunda mano, reacondicionamiento, etc.', 'estado' => '1'],
            ['nombre' => 'Hogar', 'Descripcion' => 'Emprendimientos de artículos o servicios para el hogar.', 'estado' => '1'],
            ['nombre' => 'Transporte', 'Descripcion' => 'Transportes a aeropuerto, taxis, fletes, etc.', 'estado' => '1'],
            ['nombre' => 'Otros', 'Descripcion' => 'Si no lo encontraste en las demás categorías, acá puede estar!', 'estado' => '1'],

        ];
        foreach($rubro as $rubros){
            Rubro::create($rubros);
        }
        //
    }
}
