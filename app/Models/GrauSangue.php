<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idgrau_sangue
 * @property string $descricao
 * @property string $grau
 */
class GrauSangue extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'grau_sangue';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idgrau_sangue';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descricao', 'grau'
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
        'idgrau_sangue' => 'int', 'descricao' => 'string', 'grau' => 'string'
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
