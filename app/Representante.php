<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID_REPRESENTANTE
 * @property integer $ID_CRIADEROS
 * @property string $IDENTIFICACION
 * @property string $NOMBRES
 * @property string $TELEFONOS
 * @property string $CORREO
 * @property string $DESCRIPCION
 * @property string $ETADO
 * @property Criadero $criadero
 * @property Gallo[] $gallos
 * @property InscripcionTorneo[] $inscripcionTorneos
 */
class Representante extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'representante';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_REPRESENTANTE';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['ID_REPRESENTANTE','ID_CRIADEROS', 'IDENTIFICACION', 'NOMBRES', 'TELEFONOS', 'CORREO', 'DESCRIPCION', 'ETADO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function criadero()
    {
        return $this->belongsTo('App\Criadero', 'ID_CRIADEROS', 'ID_CRIADEROS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gallos()
    {
        return $this->hasMany('App\Gallo', 'ID_REPRESENTANTE', 'ID_REPRESENTANTE');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionTorneos()
    {
        return $this->hasMany('App\InscripcionTorneo', 'ID_REPRESENTANTE', 'ID_REPRESENTANTE');
    }
}
