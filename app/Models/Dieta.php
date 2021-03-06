<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $iddieta
 * @property int    $enpl_idenpl
 * @property int    $mspl_idmspl
 * @property int    $en_iden
 * @property string $nome
 */
class Dieta extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dieta';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'iddieta';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enpl_idenpl', 'nome', 'mspl_idmspl', 'en_iden'
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
        'iddieta' => 'int', 'enpl_idenpl' => 'int', 'nome' => 'string', 'mspl_idmspl' => 'int', 'en_iden' => 'int'
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
