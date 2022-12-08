<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad_beneficio extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    public $timestamps = true;
	protected $table = 'entidad_beneficio';
    protected $fillable = ['nombre','estado'];	
}
