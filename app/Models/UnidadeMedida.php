<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idunidade_medida
 * @property string $nome
 * @property string $sigla
 */
class UnidadeMedida extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'unidade_medida';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idunidade_medida';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'sigla'
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
        'idunidade_medida' => 'int', 'nome' => 'string', 'sigla' => 'string'
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
