<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rrss extends Model
{
    use HasFactory;

    protected $connection = 'mysql'; 
    public $timestamps = true;
    protected $table = 'rrss';
    protected $fillable =['id_mype', 'instagram', 'tiktok', 'sitio_web', 'facebook', 'whatsapp_business'];
}
