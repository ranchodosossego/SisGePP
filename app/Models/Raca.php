<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idraca
 * @property int    $ativo
 * @property int    $porte_idporte
 * @property string $nome
 */
class Raca extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'raca';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idraca';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'ativo', 'porte_idporte'
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
        'idraca' => 'int', 'nome' => 'string', 'ativo' => 'int', 'porte_idporte' => 'int'
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
