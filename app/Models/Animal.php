<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idanimal
 * @property int    $raca_idraca
 * @property int    $propriedade_idpropriedade
 * @property int    $peso_entrada
 * @property int    $origem_idorigem
 * @property int    $lote_idlote
 * @property int    $grau_sangue_idgrau_sangue
 * @property int    $dias_vida
 * @property int    $data_nescimento_estimado
 * @property string $data_entrada
 * @property string $rgn
 * @property string $rgd
 * @property string $observacao
 * @property string $numero_sisbov
 * @property string $numero_brinco
 * @property string $genero
 * @property string $foto
 * @property string $data_nascimento
 * @property string $apelido
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
        'data_entrada', 'rgn', 'rgd', 'raca_idraca', 'propriedade_idpropriedade', 'peso_entrada', 'origem_idorigem', 'observacao', 'numero_sisbov', 'numero_brinco', 'lote_idlote', 'grau_sangue_idgrau_sangue', 'genero', 'foto', 'dias_vida', 'data_nescimento_estimado', 'data_nascimento', 'apelido', 'nome'
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
        'idanimal' => 'int', 'data_entrada' => 'string', 'rgn' => 'string', 'rgd' => 'string', 'raca_idraca' => 'int', 'propriedade_idpropriedade' => 'int', 'peso_entrada' => 'int', 'origem_idorigem' => 'int', 'observacao' => 'string', 'numero_sisbov' => 'string', 'numero_brinco' => 'string', 'lote_idlote' => 'int', 'grau_sangue_idgrau_sangue' => 'int', 'genero' => 'string', 'foto' => 'string', 'dias_vida' => 'int', 'data_nescimento_estimado' => 'int', 'data_nascimento' => 'string', 'apelido' => 'string', 'nome' => 'string'
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
