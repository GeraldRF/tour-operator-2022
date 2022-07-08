<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceReport extends Model
{
    use HasFactory;
    protected $fillable = ['rango_fechas', 'supplier_id', 'vehicle_id', 'reservation_id', 'driver_id'];
}
