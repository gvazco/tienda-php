<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    protected $table = "subcategorias";

    /*==================================================
    =            Inner Join desde el Modelo            =
    ==================================================*/

     public function categorias(){

    	return $this->belongsTo('App\Categorias', "id_categoria", "id");

    }

    /*=====  End of Inner Join desde el Modelo  ======*/
    
}
