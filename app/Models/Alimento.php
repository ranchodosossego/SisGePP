<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idalimento
 * @property int    $classe_alimento_idclasse_alimento
 * @property int    $subclasse_idsubclasse
 * @property float  $pndr
 * @property float  $pdr
 * @property float  $pb
 * @property float  $p
 * @property float  $ndt
 * @property float  $mm
 * @property float  $lig
 * @property float  $fdn
 * @property float  $em
 * @property float  $ee
 * @property float  $ca
 * @property float  $ms
 * @property string $nome
 */
class Alimento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'alimento';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idalimento';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'classe_alimento_idclasse_alimento', 'subclasse_idsubclasse', 'pndr', 'pdr', 'pb', 'p', 'nome', 'ndt', 'mm', 'lig', 'fdn', 'em', 'ee', 'ca', 'ms'
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
        'idalimento' => 'int', 'classe_alimento_idclasse_alimento' => 'int', 'subclasse_idsubclasse' => 'int', 'pndr' => 'float', 'pdr' => 'float', 'pb' => 'float', 'p' => 'float', 'nome' => 'string', 'ndt' => 'float', 'mm' => 'float', 'lig' => 'float', 'fdn' => 'float', 'em' => 'float', 'ee' => 'float', 'ca' => 'float', 'ms' => 'float'
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
