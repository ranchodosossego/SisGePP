<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int   $iden
 * @property int   $em_lactacao
 * @property int   $peso_vivo
 * @property float $em
 * @property float $ndt
 * @property float $p
 * @property float $pb
 * @property float $ca
 */
class En extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'en';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'iden';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'em', 'em_lactacao', 'ndt', 'p', 'pb', 'peso_vivo', 'ca'
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
        'iden' => 'int', 'em' => 'float', 'em_lactacao' => 'int', 'ndt' => 'float', 'p' => 'float', 'pb' => 'float', 'peso_vivo' => 'int', 'ca' => 'float'
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
