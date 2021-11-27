<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $idpeso_medio
 * @property int $idade_dias
 * @property int $peso_medio
 * @property int $porte_idporte
 */
class PesoMedio extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'peso_medio';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idpeso_medio';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idade_dias', 'peso_medio', 'porte_idporte'
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
        'idpeso_medio' => 'int', 'idade_dias' => 'int', 'peso_medio' => 'int', 'porte_idporte' => 'int'
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
