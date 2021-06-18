<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID_CRIADEROS
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 * @property string $ESTADO
 * @property InscripcionTorneo[] $inscripcionTorneos
 * @property Representante[] $representantes
 */
class Criadero extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'criadero';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_CRIADEROS';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['ID_CRIADEROS','NOMBRE', 'DESCRIPCION', 'ESTADO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inscripcionTorneos()
    {
        return $this->hasMany('App\InscripcionTorneo', 'ID_CRIADEROS', 'ID_CRIADEROS');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function representantes()
    {
        return $this->hasMany('App\Representante', 'ID_CRIADEROS', 'ID_CRIADEROS');
    }
}
