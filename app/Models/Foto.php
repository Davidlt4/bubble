<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Foto
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Foto extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];

    public static function getAll(){
        
      $fotos = DB::select('SELECT id,nombre FROM fotos');
      $fotosform=[];

      foreach($fotos as $foto){
          $fotosform[$foto->id]=$foto->nombre;
      }

      return $fotosform;

    }



}
