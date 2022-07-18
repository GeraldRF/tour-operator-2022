<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable=['cliente_id','proveedor_id','numero_vuelo','cantidad_pasajeros','fecha_hora','tarifa_servicio','tipo_pago','observaciones'];
}
