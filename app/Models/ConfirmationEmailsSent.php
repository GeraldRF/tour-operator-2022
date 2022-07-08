<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmationEmailsSent extends Model
{
    use HasFactory;
    protected $fillable = ['confirmado', 'supplier_id', 'client_id',];
}
