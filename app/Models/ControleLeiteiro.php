<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int  $idcontrole_leiteiro
 * @property int  $descartado
 * @property int  $animal_idanimal
 * @property Date $data_producao
 */
class ControleLeiteiro extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'controle_leiteiro';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idcontrole_leiteiro';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data_producao', 'descartado', 'ordenha1', 'ordenha2', 'ordenha3', 'animal_idanimal'
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
        'idcontrole_leiteiro' => 'int', 'data_producao' => 'date', 'descartado' => 'int', 'animal_idanimal' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'data_producao'
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
