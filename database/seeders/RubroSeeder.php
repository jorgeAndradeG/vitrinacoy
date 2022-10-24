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
            ['nombre' => 'Comida Rapida', 'Descripcion' => 'Venta de comida', 'estado' => '1'],
            ['nombre' => 'Soporte Tecnico', 'Descripcion' => 'Mantencion de computadores', 'estado' => '1'],

        ];
        foreach($rubro as $rubros){
            Rubro::create($rubros);
        }
        //
    }
}
