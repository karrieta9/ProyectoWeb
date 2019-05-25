<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $primaryKey = 'Numero';   
    protected $fillable = ['mesa']; 

    public function platos()
    {
        return $this->belongsToMany(Plato::class, 'orden_plato', 'NumOrden', 'CodPlato')->withPivot('cantidad')->withTimestamps();  
    }

    public function scopeMesa($query, $mesa){
        // dd("scope: ". $mesa);
        if($mesa != ""){
            $query->where('mesa', $mesa)->where('estado', 'N');
        }
        
    }

    public function scopeEstado($query){
            $query->where('estado', 'N');   
    }
}
