<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idanimal
 * @property int    $lote_idlote
 * @property int    $raca_idraca
 * @property int    $propriedade_idpropriedade
 * @property int    $peso_entrada
 * @property int    $origem_idorigem
 * @property int    $grau_sangue_idgrau_sangue
 * @property int    $dias_vida
 * @property int    $data_nascimento_estimado
 * @property int    $ativo
 * @property string $rgn
 * @property string $rgd
 * @property string $observacao
 * @property string $numero_sisbov
 * @property string $numero_brinco
 * @property string $nome
 * @property string $apelido
 * @property string $genero
 * @property string $foto
 * @property string $data_nascimento
 * @property string $data_entrada
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
        'lote_idlote', 'rgn', 'rgd', 'raca_idraca', 'propriedade_idpropriedade', 'peso_entrada', 'origem_idorigem', 'observacao', 'numero_sisbov', 'numero_brinco', 'nome', 'apelido', 'grau_sangue_idgrau_sangue', 'genero', 'foto', 'dias_vida', 'data_nascimento_estimado', 'data_nascimento', 'data_entrada', 'ativo'
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
        'idanimal' => 'int', 'lote_idlote' => 'int', 'rgn' => 'string', 'rgd' => 'string', 'raca_idraca' => 'int', 'propriedade_idpropriedade' => 'int', 'peso_entrada' => 'int', 'origem_idorigem' => 'int', 'observacao' => 'string', 'numero_sisbov' => 'string', 'numero_brinco' => 'string', 'nome' => 'string', 'apelido' => 'string', 'grau_sangue_idgrau_sangue' => 'int', 'genero' => 'string', 'foto' => 'string', 'dias_vida' => 'int', 'data_nascimento_estimado' => 'int', 'data_nascimento' => 'string', 'data_entrada' => 'string', 'ativo' => 'int'
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
