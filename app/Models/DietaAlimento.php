<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $iddieta_alimento
 * @property int $alimento_idalimento
 * @property int $criado_em
 * @property int $dieta_iddieta
 */
class DietaAlimento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dieta_alimento';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'iddieta_alimento';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alimento_idalimento', 'criado_em', 'dieta_iddieta', 'quantidade'
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
        'iddieta_alimento' => 'int', 'alimento_idalimento' => 'int', 'criado_em' => 'timestamp', 'dieta_iddieta' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'criado_em'
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
