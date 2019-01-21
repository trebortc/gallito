<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_DESCRIPCION
 * @property integer $ID_TORNEO
 * @property integer $ID_CRIADEROS
 * @property integer $ID_REPRESENTANTE
 * @property integer $ID_GALLO
 * @property string $NOMBRE_CRIADERO
 * @property string $NOMBRE_REPRESENTANTE
 * @property string $PLACA_GALLO
 * @property float $PESO_GALLO
 * @property float $EDAD_GALLO
 * @property float $TALLA_GALLO
 * @property string $ESTADO
 * @property Torneo $torneo
 * @property Criadero $criadero
 * @property Representante $representante
 * @property Gallo $gallo
 * @property PeleaGallo[] $peleaGallos
 * @property PeleaGallo[] $peleaGallos
 */
class InscripcionTorneo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'inscripcion_torneo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_DESCRIPCION';

    /**
     * @var array
     */
    protected $fillable = ['ID_TORNEO', 'ID_CRIADEROS', 'ID_REPRESENTANTE', 'ID_GALLO', 'NOMBRE_CRIADERO', 'NOMBRE_REPRESENTANTE', 'PLACA_GALLO', 'PESO_GALLO', 'EDAD_GALLO', 'TALLA_GALLO', 'ESTADO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function torneo()
    {
        return $this->belongsTo('App\Torneo', 'ID_TORNEO', 'ID_TORNEO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function criadero()
    {
        return $this->belongsTo('App\Criadero', 'ID_CRIADEROS', 'ID_CRIADEROS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function representante()
    {
        return $this->belongsTo('App\Representante', 'ID_REPRESENTANTE', 'ID_REPRESENTANTE');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gallo()
    {
        return $this->belongsTo('App\Gallo', 'ID_GALLO', 'ID_GALLO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peleaGallos1()
    {
        return $this->hasMany('App\PeleaGallo', 'INS_ID_DESCRIPCION', 'ID_DESCRIPCION');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function peleaGallos2()
    {
        return $this->hasMany('App\PeleaGallo', 'ID_DESCRIPCION', 'ID_DESCRIPCION');
    }
}
