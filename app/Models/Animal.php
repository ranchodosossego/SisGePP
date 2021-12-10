<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idanimal
 * @property int    $grau_sangue_idgrau_sangue
 * @property int    $lote_idlote
 * @property int    $origem_idorigem
 * @property int    $propriedade_idpropriedade
 * @property int    $ativo
 * @property int    $peso_entrada
 * @property int    $data_nascimento_estimado
 * @property int    $dias_vida
 * @property string $numero_brinco
 * @property string $observacao
 * @property string $foto
 * @property string $numero_sisbov
 * @property string $rgd
 * @property string $apelido
 * @property string $data_entrada
 * @property string $data_nascimento
 * @property string $genero
 * @property string $nome
 * @property string $rgn
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
        'numero_brinco', 'grau_sangue_idgrau_sangue', 'lote_idlote', 'origem_idorigem', 'propriedade_idpropriedade', 'ativo', 'observacao', 'foto', 'numero_sisbov', 'rgd', 'apelido', 'peso_entrada', 'data_entrada', 'data_nascimento_estimado', 'data_nascimento', 'dias_vida', 'genero', 'nome', 'rgn'
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
        'idanimal' => 'int', 'numero_brinco' => 'string', 'grau_sangue_idgrau_sangue' => 'int', 'lote_idlote' => 'int', 'origem_idorigem' => 'int', 'propriedade_idpropriedade' => 'int', 'ativo' => 'int', 'observacao' => 'string', 'foto' => 'string', 'numero_sisbov' => 'string', 'rgd' => 'string', 'apelido' => 'string', 'peso_entrada' => 'int', 'data_entrada' => 'string', 'data_nascimento_estimado' => 'int', 'data_nascimento' => 'string', 'dias_vida' => 'int', 'genero' => 'string', 'nome' => 'string', 'rgn' => 'string'
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
