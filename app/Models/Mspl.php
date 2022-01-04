<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int   $idmspl
 * @property float $producao_leite
 * @property float $peso_vivo
 * @property float $percentual_peso_vivo
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
        'producao_leite', 'peso_vivo', 'percentual_peso_vivo'
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
        'idmspl' => 'int', 'producao_leite' => 'float', 'peso_vivo' => 'float', 'percentual_peso_vivo' => 'float'
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
