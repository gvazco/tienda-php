<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = "productos";

    /*==================================================
    =            Inner Join desde el Modelo            =
    ==================================================*/
    public function categorias(){

    	return $this->belongsTo('App\Categorias', "id_categoria", "id");

    }

    public function subcategorias(){

    	return $this->belongsTo('App\Subcategorias', "id_subcategoria", "id");
    	
    }

    
    
    /*=====  End of Inner Join desde el Modelo  ======*/
    
}
