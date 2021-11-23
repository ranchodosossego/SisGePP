<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idanimal
 * @property int    $classificacao_etaria_idclassificacao_etaria
 * @property int    $peso_entrada
 * @property int    $origem_idorigem
 * @property int    $grau_sangue_idgrau_sangue
 * @property int    $dias_vida
 * @property int    $propriedade_idpropriedade
 * @property int    $raca_idraca
 * @property string $observacao
 * @property string $numero_sisbov
 * @property string $numero_brinco
 * @property string $nome
 * @property string $genero
 * @property string $foto
 * @property string $apelido
 * @property string $rgd
 * @property string $rgn
 * @property Date   $data_entrada
 */
class Animal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'animal';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idanimal';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'classificacao_etaria_idclassificacao_etaria', 'peso_entrada', 'origem_idorigem', 'observacao', 'numero_sisbov', 'numero_brinco', 'nome', 'grau_sangue_idgrau_sangue', 'genero', 'foto', 'dias_vida', 'data_entrada', 'apelido', 'propriedade_idpropriedade', 'raca_idraca', 'rgd', 'rgn'
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
        'idanimal' => 'int', 'classificacao_etaria_idclassificacao_etaria' => 'int', 'peso_entrada' => 'int', 'origem_idorigem' => 'int', 'observacao' => 'string', 'numero_sisbov' => 'string', 'numero_brinco' => 'string', 'nome' => 'string', 'grau_sangue_idgrau_sangue' => 'int', 'genero' => 'string', 'foto' => 'string', 'dias_vida' => 'int', 'data_entrada' => 'date', 'apelido' => 'string', 'propriedade_idpropriedade' => 'int', 'raca_idraca' => 'int', 'rgd' => 'string', 'rgn' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'data_entrada'
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
