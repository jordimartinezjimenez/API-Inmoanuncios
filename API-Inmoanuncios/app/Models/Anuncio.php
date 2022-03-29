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
        'imagen',
        'vendedor',
        'provincia_id',
        'municipio_id',
        'cp',
        'precio',
        'tipo_id',
        'habitaciones',
        'area',
        'descripcion',
        'trato',
    ];
    // referencia imagen vendedor provincia municipio cp precio tipo habitaciones area descripcion trato
}
