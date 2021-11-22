<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idpropriedade
 * @property string $foto
 * @property string $latitude
 * @property string $longitude
 * @property string $nome
 * @property string $url
 */
class Propriedade extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'propriedade';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idpropriedade';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foto', 'latitude', 'longitude', 'nome', 'url'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idpropriedade' => 'int', 'foto' => 'string', 'latitude' => 'string', 'longitude' => 'string', 'nome' => 'string', 'url' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
}
