<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idclasse_alimento
 * @property string $nome
 */
class ClasseAlimento extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classe_alimento';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idclasse_alimento';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome'
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
        'idclasse_alimento' => 'int', 'nome' => 'string'
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
