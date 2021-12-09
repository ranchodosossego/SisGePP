<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idmetodo_reprodutivo
 * @property string $nome
 * @property string $sigla
 */
class MetodoReprodutivo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'metodo_reprodutivo';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idmetodo_reprodutivo';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'sigla'
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
        'idmetodo_reprodutivo' => 'int', 'nome' => 'string', 'sigla' => 'string'
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
