<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idusuario
 * @property int    $data_inclusao
 * @property int    $propriedade_idpropriedade
 * @property string $cargo
 * @property string $foto
 * @property string $nome
 */
class Usuario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usuario';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idusuario';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cargo', 'data_inclusao', 'foto', 'nome', 'propriedade_idpropriedade', 'users_id'
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
        'idusuario' => 'int', 'cargo' => 'string', 'data_inclusao' => 'timestamp', 'foto' => 'string', 'nome' => 'string', 'propriedade_idpropriedade' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'data_inclusao'
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
