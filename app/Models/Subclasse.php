<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idsubclasse
 * @property string $nome
 */
class Subclasse extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subclasse';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idsubclasse';

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
        'idsubclasse' => 'int', 'nome' => 'string'
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
