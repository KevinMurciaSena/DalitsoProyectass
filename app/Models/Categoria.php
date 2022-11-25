<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{

    
    protected $fillable = [
        'nombre',
    ];
    
    public function productos()
    {
        return $this->hasMany(Producto::class, "categoria_id");
    }  
}
