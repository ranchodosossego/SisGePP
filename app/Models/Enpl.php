<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int   $idenpl
 * @property float $em
 * @property float $pb
 * @property float $p
 * @property float $ndt
 * @property float $gordura
 * @property float $ca
 */
class Enpl extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'enpl';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'idenpl';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'em', 'pb', 'p', 'ndt', 'gordura', 'ca'
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
        'idenpl' => 'int', 'em' => 'float', 'pb' => 'float', 'p' => 'float', 'ndt' => 'float', 'gordura' => 'float', 'ca' => 'float'
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
