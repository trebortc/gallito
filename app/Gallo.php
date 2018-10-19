<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID_GALLO
 * @property integer $ID_REPRESENTANTE
 * @property string $PLACA
 * @property float $PESO
 * @property float $EDAD
 * @property float $TALLA
 * @property string $ESTADO
 * @property Representante $representante
 * @property InscripcionTorneo[] $inscripcionTorneos
 */
class Gallo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'gallo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_GALLO';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['ID_REPRESENTANTE', 'PLACA', 'PESO', 'EDAD', 'TALLA', 'ESTADO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function representante()
    {
        return $this->belongsTo('App\Representante', 'ID_REPRESENTANTE', 'ID_REPRESENTANTE');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionTorneos()
    {
        return $this->hasMany('App\InscripcionTorneo', 'ID_GALLO', 'ID_GALLO');
    }
}
