<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $primaryKey = 'codigo';
    protected $fillable = ['nombre','proveedor']; 

    public function platos()
    {
        return $this->belongsToMany(Plato::class, 'plato_ingredientes', 'CodIngrediente', 'CodPlato');  
    }
}
