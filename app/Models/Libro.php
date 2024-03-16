<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo',
        'imagen',
        'genero',
        'fecha_publicacion',
        'calificacion',
        'autores'
    ];

    public static function isUniqueTitle($titulo)
    {
        return !Libro::where('titulo', $titulo)->exists();
    }

    // Puedes agregar relaciones con otros modelos aquí

    // Ejemplo:
    // public function autor()
    // {
    //     return $this->belongsTo(Autor::class);
    // }
}