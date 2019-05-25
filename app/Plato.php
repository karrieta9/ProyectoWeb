<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $primaryKey = 'codigo';   
    protected $fillable = ['nombre','valor']; 
       

    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'plato_ingredientes', 'CodPlato', 'CodIngrediente')->withPivot('cantidad')->withTimestamps();
    }

    public function ordenes()
    {
        return $this->belongsToMany(Plato::class, 'orden_plato', 'CodPlato', 'NumOrden');  
    }

    
}
