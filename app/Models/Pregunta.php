<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    public $timestamps = true;
	protected $table = 'pregunta';
    protected $fillable = ['id_mype' , 'id_superadmin' , 'pregunta' , 'respuesta' , 'estado'];	
}
