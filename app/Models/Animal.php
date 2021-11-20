<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idanimal
 * @property int    $grau_sangue_idgrau_sangue
 * @property int    $origem_idorigem
 * @property int    $peso_entrada
 * @property int    $propriedade_idpropriedade
 * @property int    $raca_idraca
 * @property string $apelido
 * @property string $foto
 * @property string $genero
 * @property string $nome
 * @property string $numero_brinco
 * @property string $numero_sisbov
 * @property string $observacao
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
        'apelido', 'data_entrada', 'foto', 'genero', 'grau_sangue_idgrau_sangue', 'nome', 'numero_brinco', 'numero_sisbov', 'observacao', 'origem_idorigem', 'peso_entrada', 'propriedade_idpropriedade', 'raca_idraca', 'rgd', 'rgn'
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
        'idanimal' => 'int', 'apelido' => 'string', 'data_entrada' => 'date', 'foto' => 'string', 'genero' => 'string', 'grau_sangue_idgrau_sangue' => 'int', 'nome' => 'string', 'numero_brinco' => 'string', 'numero_sisbov' => 'string', 'observacao' => 'string', 'origem_idorigem' => 'int', 'peso_entrada' => 'int', 'propriedade_idpropriedade' => 'int', 'raca_idraca' => 'int', 'rgd' => 'string', 'rgn' => 'string'
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
