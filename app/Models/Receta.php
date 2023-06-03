<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Receta
 *
 * @property $id
 * @property $nombre
 * @property $ingredientes
 * @property $id_imagen
 * @property $id_categoria
 * @property $preparacion
 * @property $id_usuario
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Receta extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'ingredientes' => 'required',
		'id_categoria' => 'required',
		'preparacion' => 'required',
		'id_usuario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','ingredientes','id_imagen','id_categoria','preparacion','id_usuario'];

    public static function getAll(){
        
      $recetas = DB::select('SELECT * FROM recetas');
      $recetasform=[];

      foreach($recetas as $receta){
          $recetasform[$receta->id]=$receta->nombre;
      }

      return $recetasform;

    }



}
