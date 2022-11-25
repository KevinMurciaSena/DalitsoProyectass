<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'nombre','precio','unidades', 'precioT', 'foto', 'producto_id','user_id'];
}
