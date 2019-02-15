<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $NOMBRE_PARAMETRO
 * @property string $VALOR
 */
class Parametro extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'parametro';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'NOMBRE_PARAMETRO';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['NOMBRE_PARAMETRO','VALOR'];

}
