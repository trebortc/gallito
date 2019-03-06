<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID_PELEA
 * @property int $ID_DESCRIPCION
 * @property int $INS_ID_DESCRIPCION
 * @property string $RESULTADO
 * @property int $TIEMPO
 * @property string $OBSERVACION
 * @property string $ESTADO
 * @property InscripcionTorneo $inscripcionTorneo
 * @property InscripcionTorneo $inscripcionTorneo
 */
class PeleaGallos extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_PELEA';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['ID_DESCRIPCION', 'INS_ID_DESCRIPCION', 'RESULTADO', 'TIEMPO', 'OBSERVACION', 'ESTADO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inscripcionTorneo1()
    {
        return $this->belongsTo('App\InscripcionTorneo', 'INS_ID_DESCRIPCION', 'ID_DESCRIPCION');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inscripcionTorneo2()
    {
        return $this->belongsTo('App\InscripcionTorneo', 'ID_DESCRIPCION', 'ID_DESCRIPCION');
    }

}
