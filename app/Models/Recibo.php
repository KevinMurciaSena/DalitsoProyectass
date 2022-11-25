<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recibo extends Model
{
    protected $fillable = ['name', 'email', 'direccion', 'descripcion' , 'precioT' ,'user_id'];
}
