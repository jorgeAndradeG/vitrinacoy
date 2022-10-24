<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    public $timestamps = true;
	protected $table = 'rubro';	
	protected $fillable = ['nombre','descripcion','estado'];
}
