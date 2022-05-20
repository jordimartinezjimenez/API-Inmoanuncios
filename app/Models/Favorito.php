<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'anuncio_id',
        'usuario_id'
    ];

    /**
     * Get the usuario that owns the favorito.
     */
    public function usuario()
    {
        return $this->belongsTo(General::class);
    }

    /**
     * Get the anuncio that owns the favorito.
     */
    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }
}
