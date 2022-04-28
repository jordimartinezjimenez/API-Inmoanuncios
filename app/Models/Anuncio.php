<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'referencia',
        'vendedor_id',
        'imagen',
        'municipio_id',
        'cp',
        'precio',
        'tipo_id',
        'trato',
        'habitaciones',
        'area',
        'descripcion',
        'created_at',
    ];

    /**
     * Get the tipo that owns the anuncio.
     */
    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }

    /**
     * Get the municipio that owns the anuncio.
     */
    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    /**
     * Get the vendedor that owns the anuncio.
     */
    public function vendedor()
    {
        return $this->belongsTo(General::class);
    }

    /**
     * Get the provincia that owns the anuncio.
     */
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }
}
