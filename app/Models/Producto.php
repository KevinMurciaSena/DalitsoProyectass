<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{

    protected $fillable = ['nombre', 'descripcion', 'precio', 'unidades','categoria_id', 'foto'];
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
