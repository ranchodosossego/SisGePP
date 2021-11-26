<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $idhistorico_peso
 * @property int    $data_pesagem
 * @property int    $peso_atual
 * @property int    $animal_idanimal
 * @property string $peso_anterior
 */
class HistoricoPeso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'historico_peso';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idhistorico_peso';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'peso_anterior', 'data_pesagem', 'peso_atual', 'animal_idanimal'
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
        'idhistorico_peso' => 'int', 'peso_anterior' => 'string', 'data_pesagem' => 'timestamp', 'peso_atual' => 'int', 'animal_idanimal' => 'int'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'data_pesagem'
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
