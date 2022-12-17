<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $connection = 'mysql'; 
    public $timestamps = true;
    protected $table = 'producto';
    protected $fillable =['id_mype', 'nombre', 'descripcion', 'foto', 'estado', 'precio', 'stock' ];
}
