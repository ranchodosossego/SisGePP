<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idestagio_reprodutivo
 * @property string $nome
 */
class EstagioReprodutivo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'estagio_reprodutivo';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idestagio_reprodutivo';

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
        'idestagio_reprodutivo' => 'int', 'nome' => 'string'
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
