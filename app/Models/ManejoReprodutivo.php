<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idmanejo_reprodutivo
 * @property int    $animal_idanimal
 * @property int    $metodo_reprodutivo_idmetodo_reprodutivo
 * @property int    $estagio_reprodutivo_idestagio_reprodutivo
 * @property string $local
 * @property string $data_procedimento
 */
class ManejoReprodutivo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'manejo_reprodutivo';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idmanejo_reprodutivo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'local', 'data_procedimento', 'animal_idanimal', 'metodo_reprodutivo_idmetodo_reprodutivo', 'estagio_reprodutivo_idestagio_reprodutivo'
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
        'idmanejo_reprodutivo' => 'int', 'local' => 'string', 'data_procedimento' => 'string', 'animal_idanimal' => 'int', 'metodo_reprodutivo_idmetodo_reprodutivo' => 'int', 'estagio_reprodutivo_idestagio_reprodutivo' => 'int'
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
