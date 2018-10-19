<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID_TORNEO
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 * @property string $FECHA
 * @property string $ESTADO
 * @property InscripcionTorneo[] $inscripcionTorneos
 */
class Torneo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'torneo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_TORNEO';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['NOMBRE', 'DESCRIPCION', 'FECHA', 'ESTADO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionTorneos()
    {
        return $this->hasMany('App\InscripcionTorneo', 'ID_TORNEO', 'ID_TORNEO');
    }
}
