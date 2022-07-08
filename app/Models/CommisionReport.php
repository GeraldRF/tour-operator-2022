<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommisionReport extends Model
{
    use HasFactory;
    protected $fillable = ['rango_fechas', 'supplier_id', 'reservation_id',];
}
