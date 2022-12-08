<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    public $timestamps = true;
	protected $table = 'beneficio';
    protected $fillable = ['id_entidad' , 'nombre' , 'descripcion' , 'edad_minima' , 'tipo_persona_postulante', 'sexo_postulante', 'tiene_inicio_actividades', 'ventas_netas_minimas', 'ventas_netas_maximas', 'meses_antiguedad_inicio_actividades', 'participa_en_fosis', 'link','estado'];	
}
