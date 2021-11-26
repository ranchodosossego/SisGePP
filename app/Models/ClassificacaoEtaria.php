<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idclassificacao_etaria
 * @property int    $dia_final
 * @property int    $dia_inicial
 * @property string $nome
 */
class ClassificacaoEtaria extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classificacao_etaria';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idclassificacao_etaria';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dia_final', 'dia_inicial', 'nome'
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
        'idclassificacao_etaria' => 'int', 'dia_final' => 'int', 'dia_inicial' => 'int', 'nome' => 'string'
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
