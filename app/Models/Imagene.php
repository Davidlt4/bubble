<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Imagene
 *
 * @property $id
 * @property $nombre
 * @property $galeria
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Imagene extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'galeria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','galeria'];



}
