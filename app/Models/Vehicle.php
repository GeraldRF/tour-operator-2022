<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    //crear propiedades de la tabla
    protected $fillable = ['placa', 'marca', 'modelo', 'capacidad'];


    
}

