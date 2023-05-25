<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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



}
