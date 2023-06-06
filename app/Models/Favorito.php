<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Favorito
 *
 * @property $id
 * @property $id_usuario
 * @property $id_receta
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Favorito extends Model
{
    
    static $rules = [
		'id_usuario' => 'required',
		'id_receta' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_usuario','id_receta'];



}
