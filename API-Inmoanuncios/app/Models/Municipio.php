<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'provincia_id'
    ];

    /**
     * Get the provincia that owns the anuncio.
     */
    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }
}
