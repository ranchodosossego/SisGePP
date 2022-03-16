<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int   $idestoque
 * @property int   $data_update
 * @property int   $unidade_medida_idunidade_medida
 * @property int   $alimento_idalimento
 * @property float $quantidade
 */
class Estoque extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'estoque';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idestoque';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantidade', 'data_update', 'unidade_medida_idunidade_medida', 'alimento_idalimento'
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
        'idestoque' => 'int', 'quantidade' => 'float', 'data_update' => 'timestamp', 'unidade_medida_idunidade_medida' => 'int', 'alimento_idalimento' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'data_update'
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
