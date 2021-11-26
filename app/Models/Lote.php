<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idlote
 * @property int    $tipo_lote_idtipo_lote
 * @property int    $criado_em
 * @property int    $dieta_iddieta
 * @property string $limite
 * @property string $codigo
 */
class Lote extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lote';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idlote';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_lote_idtipo_lote', 'criado_em', 'dieta_iddieta', 'limite', 'codigo'
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
        'idlote' => 'int', 'tipo_lote_idtipo_lote' => 'int', 'criado_em' => 'timestamp', 'dieta_iddieta' => 'int', 'limite' => 'string', 'codigo' => 'string'
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
