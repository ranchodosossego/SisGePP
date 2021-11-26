<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idanimal
 * @property int    $grau_sangue_idgrau_sangue
 * @property int    $raca_idraca
 * @property int    $propriedade_idpropriedade
 * @property int    $peso_entrada
 * @property int    $data_nescimento_estimado
 * @property int    $dias_vida
 * @property int    $origem_idorigem
 * @property string $data_entrada
 * @property string $observacao
 * @property string $foto
 * @property string $numero_sisbov
 * @property string $rgd
 * @property string $rgn
 * @property string $apelido
 * @property string $numero_brinco
 * @property string $data_nascimento
 * @property string $genero
 * @property string $nome
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
        'data_entrada', 'grau_sangue_idgrau_sangue', 'raca_idraca', 'propriedade_idpropriedade', 'observacao', 'foto', 'numero_sisbov', 'rgd', 'rgn', 'apelido', 'numero_brinco', 'peso_entrada', 'data_nescimento_estimado', 'data_nascimento', 'dias_vida', 'genero', 'nome', 'origem_idorigem'
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
        'idanimal' => 'int', 'data_entrada' => 'string', 'grau_sangue_idgrau_sangue' => 'int', 'raca_idraca' => 'int', 'propriedade_idpropriedade' => 'int', 'observacao' => 'string', 'foto' => 'string', 'numero_sisbov' => 'string', 'rgd' => 'string', 'rgn' => 'string', 'apelido' => 'string', 'numero_brinco' => 'string', 'peso_entrada' => 'int', 'data_nescimento_estimado' => 'int', 'data_nascimento' => 'string', 'dias_vida' => 'int', 'genero' => 'string', 'nome' => 'string', 'origem_idorigem' => 'int'
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
