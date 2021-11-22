<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idanimal
 * @property int    $raca_idraca
 * @property int    $propriedade_idpropriedade
 * @property int    $peso_entrada
 * @property int    $origem_idorigem
 * @property int    $grau_sangue_idgrau_sangue
 * @property Date   $data_entrada
 * @property string $rgn
 * @property string $rgd
 * @property string $observacao
 * @property string $numero_sisbov
 * @property string $numero_brinco
 * @property string $nome
 * @property string $genero
 * @property string $foto
 * @property string $apelido
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
        'data_entrada', 'rgn', 'rgd', 'raca_idraca', 'propriedade_idpropriedade', 'peso_entrada', 'origem_idorigem', 'observacao', 'numero_sisbov', 'numero_brinco', 'nome', 'grau_sangue_idgrau_sangue', 'genero', 'foto', 'apelido'
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
        'idanimal' => 'int', 'data_entrada' => 'date', 'rgn' => 'string', 'rgd' => 'string', 'raca_idraca' => 'int', 'propriedade_idpropriedade' => 'int', 'peso_entrada' => 'int', 'origem_idorigem' => 'int', 'observacao' => 'string', 'numero_sisbov' => 'string', 'numero_brinco' => 'string', 'nome' => 'string', 'grau_sangue_idgrau_sangue' => 'int', 'genero' => 'string', 'foto' => 'string', 'apelido' => 'string'
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
