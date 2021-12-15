<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int   $idmspl
 * @property float $percentual_peso_vivo
 * @property float $peso_vivo
 * @property float $producao_leite
 */
class Mspl extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mspl';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idmspl';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'percentual_peso_vivo', 'peso_vivo', 'producao_leite'
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
        'idmspl' => 'int', 'percentual_peso_vivo' => 'float', 'peso_vivo' => 'float', 'producao_leite' => 'float'
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
